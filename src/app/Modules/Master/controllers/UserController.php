<?php
namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\User, 
    Datatables,
    Html,
    Form;

class UserController extends Controller
{
    protected $_modules = 'master/user';
    
    public function __construct()
    {
        
    }

    public function index() 
    {

    }

    public function getData(Request $request)
    {
        $input = $request->all();
        return Datatables::of(User::data())
        ->filter(function($query) use ($input) {
            if (!empty($input['email'])) {
                $query->where('email','like','%' . $input['email'] . '%');
            }
        })
        ->addColumn('action', function($query) {
            $html = '<slot>';
            $html .= Form::button('<i class="fa fa-pencil"></i> Edit',[
                    'type' => 'button',
                    'class' => 'btn btn-xs btn-info',
                    'style' => 'margin-right:5px',
                    'data-target' => '#modal-detail-config',
                    'data-url' => 'http://dcms.app/master/user/add/'.$query->id,
                    '@click' => 'showModal'
            ]);
            $html .= Html::decode(Html::link($this->_modules .'/'.$query->id,
                '<i class="fa fa-trash"></i> Hapus',[
                    'class' => 'btn btn-xs btn-danger',
                    'style' => 'margin-right:5px'
                ]));
            $html .= '</slot>';
            return $html;
        })
        ->make(true);
    }

    public function getAdd($id = null)
    {
        $data = [
            'title' => 'Tambah User',
            'email' => '',
            'name' => '',
            'action' => $this->_modules . '/proses-simpan/' . $id
        ];
        $qUser = User::find($id);
        if (!empty($qUser)) {
            $data['title'] = 'Edit User';
            $data['email'] = $qUser->email;
            $data['name'] = $qUser->name;
        }
        return response()->json($data);
    }

    public function postSimpan(Request $request, $id)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'name' => 'required'
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'name.required' => 'Nama Tidak Boleh Kosong',
            'email.email' => 'Email Tidak Valid'
        ]);
        if ($id) {
            try {
                $data = [
                    'email' => $input['email'],
                    'name' => $input['name']
                ];
                $qUser = User::findOrFail($id)->update($data);
                if ($qUser) {
                    $message = [
                        'message' => 'Data Berhasil Terupdate'
                    ];
                }
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Terjadi Kesalahan Pada Sistem'
                ],422);
            } catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'Data Tidak Di Kenali'
                ],422);
            }
        } else {
            $message = [
                'message' => 'Data Berhasil Tersimpan'
            ];
        }
        return response()->json($message);
    }
}
<?php
namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User, 
    Request,
    Datatables,
    Html,
    Form;

class UserController extends Controller
{
    protected $_modules = 'master/user';
    
    public function __construct()
    {
        # code...
    }

    public function index() 
    {

    }

    public function getData(Request $input)
    {
        return Datatables::of(User::data())
        ->filter(function($query) {

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

    public function postSimpan()
    {
        return response()->json([]);
    }
}
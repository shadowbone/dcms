<?php
namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
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
                    'data-url' => 'http://dcms.app/master/user/add',
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

    public function getAdd()
    {
        return response()->json([
            'title' => 'Tambah Modal',
            'nama' => 'Test nama'
        ]);
    }
}
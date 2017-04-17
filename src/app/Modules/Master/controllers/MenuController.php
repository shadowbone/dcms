<?php
namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Modules\Master\Models\Menu;

class MenuController extends Controller
{
    protected $_html = '';
    protected $_modul = 'master/menu';
    protected $_data = '';

    public function __construct()
    {
        # code...
    }

    public function index()
    {
        $qMenu = $this->_menu();
        return response()->json(['data' => $qMenu]);
    }

    public function getData()
    {
        $qMenu = Menu::all();
        $tmp_menu = [];
        foreach ($qMenu as $value) {
            $parent = !empty($value->parent_id) ? $value->parent_id : 0;
            $url = '#';
            if ($value->url) {
                $url = $value->url;
            }
            $tmp_menu[$parent][] = [
                'id' => $value->id,
                'name' => $value->name,
                'url' => $url,
                'icon' => $value->icon
            ];

        }
        return $tmp_menu;
    }

    public function postAdd($id = null)
    {

    }

    public function postEdit($id = null)
    {

    }

    public function postDelete($id = null)
    {

    }

    private function _parsing ($id = 0) 
    {
        if (isset($this->_data[$id])) {
            $html = '';
            foreach ($this->_data[$id] as $val) {
               $html .= '<li class="dd-item dd2-item">';
                   $html .= '<div class="dd-handle dd2-handle">';
                       $html .= '<i class="menu-icon '. $val['icon'] .' blue bigger-130"></i>';
                       $html .= '<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>';
                   $html .= '</div>';
                   $html .= '<div class="dd2-content">';
                       $html .= $val['name'];
                       $html .= '<div class="pull-right action-buttons">';
                            $html .= '<button type="button" 
                                    class="btn btn-minier btn-success btn-sm" 
                                    style="margin-right : 5px;"
                                    data-url="' . $this->_modul .'/add/'.$val['id'].'"
                                    v-on:click="addMenu">
                                        <i class="fa fa-plus"></i>
                                      </button>';
                            $html .= '<button type="button" 
                                    class="btn btn-minier btn-info btn-sm"
                                    style="margin-right : 5px;"
                                    data-url="' . $this->_modul .'/edit/'.$val['id'].'"
                                    v-on:click="editMenu">
                                        <i class="fa fa-edit"></i>
                                      </button>';
                            $html .= '<button 
                                    type="button" 
                                    class="btn btn-minier btn-danger btn-sm"
                                    style="margin-right : 5px;"
                                    data-url="' . $this->_modul .'/delete/'.$val['id'].'"
                                    v-on:click="deleteMenu"
                                    >
                                        <i class="fa fa-trash"></i>
                                      </button>';
                       $html .= '</div>';
                   $html .= '</div>';
                   if (isset($this->_data[$val['id']])) {
                       $html .= '<ol class="dd-list">';
                       $html .= $this->_parsing($val['id']);
                       $html .= '</ol>';
                   }
               $html .= '</li>';
            }
            return $html;
        }
    }

    private function _menu()
    {
        $this->_data = $this->getData();
        $this->_html = '<div class="dd dd-draghandle" style="max-width:100%!important;" id="menu-nestable">';
        $this->_html .= '<ol class="dd-list">';
        $this->_html .= $this->_parsing();
        $this->_html .= '</ol>';
        $this->_html .= '</div>';
        return $this->_html;
    }
}
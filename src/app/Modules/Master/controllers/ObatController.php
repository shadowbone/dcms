<?php

namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
use View;

class ObatController extends Controller
{

    protected $_module = 'kepegawaian/master/departmen';

    public function __construct ()
    {

    }

    public function index () {
        return view('obat.index');
    }

}
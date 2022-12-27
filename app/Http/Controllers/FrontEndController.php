<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //methods here

    function index(){
        return view('welcome');
    }

}

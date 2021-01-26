<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Firstcontroller extends Controller
{
    public function __construct(){
        #$this->middleware('auth') ->except('');
    }

    //

    public function showString(){

        return "a7a al shibshib daa";
    }

}

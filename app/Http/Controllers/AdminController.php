<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function addProduct(){
        echo "this is add product page";
    }

    function editProduct($masoSP=1){
        echo $masoSP;
    }

    function index(){
        //return view('welcome');
        return view('home');
    }
}

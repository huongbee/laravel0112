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
        // $array =[
        //     'title' => 'Home Page',
        //     'description' => 'this is home page of admin... '
        // ];
        //return view('home',$array);


        // return view('home',[
        //     'title' => 'Home Page',
        //     'description' => 'this is home page of admin... '
        // ]);

        $title = 'Home Page';
        $description = 'this is home page of admin....';

        return view('home',compact('title','description'));
    }

    function getDetailProduct($id, $alias){
        //return view('detail',compact('id','alias','array'));
        
        $array = [
            'PHP',
            'iOS',
            'Android',
            'Nodejs'  
        ];

        return view('detail',[
            'id' => $id,
            'alias' => $alias,
            'array' => $array
        ]);
    }

    function getRegister(){
        //return view('admin/register');
        return view('admin.register');
    }
}

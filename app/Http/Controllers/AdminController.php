<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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

    function postRegister(Request $req){
        //echo $fullname = $req->input('fullname');
        //echo $fullname = $req->fullname;
        // $input = $req->all();

        // dd($input);

        /**
         * fullname: required, min:6, max:50
         * email : required, đúng định dang
         * birthdate required, đúng định dang
         * age: required, phải nhập số
         * pw: required, min:6, ,max: 20
         * confirm_pw required, giống với pw
         */
        $arrV = [
            'fullname' => 'required|min:6|max:50',
            'email' => 'required|email',
            'age'=>'required|numeric',
            'birthdate'=> 'required|date',
            'password' => 'required|min:6|max:20',
            'confirm_password'=> 'required|same:password'
        ];

        $arrMess = [
            'fullname.required' => 'Họ tên ko được rỗng',
            'fullname.min' => 'Họ tên ít nhất :min ký tự'
        ];
        $validator = Validator::make($req->all(),$arrV,$arrMess);

        if($validator->fails())
            return redirect()->route('register')
                            ->withErrors($validator)
                            ->withInput();   
    
        /// luu db
    }
}

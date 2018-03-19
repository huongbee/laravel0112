<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('detail', function(){
//     echo "Hello Class";
// });

Route::get('detail-{id}-{alias}', function($id,$alias){
    echo "Hello Class";
    echo "---------";
    echo $id;
    echo "---------";
    echo $alias;
    //echo $_GET['id'];
})->name('detail_page');

// Route::get('list-product/{type?}/{page?}', function($type, $page=1){
//     echo $page;
// })
// ->where('page','[0-9]*')
// ->where('type','[a-z0-9]*');
Route::get('list-product-{type?}/{page?}', function($type='type-1', $page=1){
    echo $page;
    echo $type;
})
->where([
    'page'=>'[0-9]*',
    'type'=>'[a-z-0-9]*'
]);

Route::get('login',function(){
    echo "this is login page";
})->name('user_login');

//customer
Route::group(['prefix'=>'/'],function(){

    Route::get('home',function(){
        if(1>2) return 1; //user logged in;
        //return redirect()->route('user_login'); //user not yet login
        return redirect()->route('detail_page',[
            'id'=>12,
            'alias'=>'sanpham3456'
        ]);
    });

});

//admin
Route::group(['prefix'=>'admin'],function(){

    // admin/home
    // Route::get('home',function(){
    //     echo "this is admin page";
    // });
    Route::get('home','AdminController@index');

    Route::get('add-product','AdminController@addProduct');

    Route::get('edit-product-{id?}','AdminController@editProduct');

    Route::get('detail-product-{id}-{alias}','AdminController@getDetailProduct');

});


//Route::get('register','AdminController@getRegister')->name('register');

Route::get('register',[
    'uses'=>'AdminController@getRegister',
    'as'=>'register', //name route
    //'where'=>''
]);

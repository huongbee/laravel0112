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
/*
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

*/
//Route::get('register','AdminController@getRegister')->name('register');

Route::get('register',[
    'uses'=>'AdminController@getRegister',
    'as'=>'register', //name route
    //'where'=>''
]);

Route::post('register',[
    'uses'=>'AdminController@postRegister',
    'as'=>'register'
]);


Route::get('upload-file',[
    'uses'=>'AdminController@getFormUpload',
    'as'=>'uploadFile'
]);

Route::post('upload-file',[
    'uses'=>'AdminController@postFormUpload',
    'as'=>'uploadFile'
]);

Route::get('detail-page','AdminController@getDetail');
Route::get('home-page','AdminController@getHome');

//id, name, price, image
Route::get('create-table-product',function(){

    Schema::create('product',function($table){
        $table->increments('id'); //PK, AI
        $table->string('name',100);
        $table->float('price',8,0);
        $table->string('image',50);
    });
    echo "success";

});

// id, name, status->default:0
Route::get('create-table-type-product',function(){

    Schema::create('type_product',function($table){
        $table->increments('id'); //PK, AI
        $table->string('name',100);
        $table->boolean('status')
                ->default(0)
                ->comment('0:false; 1:true');
        $table->date('update_at');
    });
    echo "success";

});

Route::get('modifyle-table-product',function(){

    Schema::table('product',function($table){
        $table->integer('type_id')->unsigned();

        //tạo khoá ngoại
        $table->foreign('type_id')
                ->references('id')
                ->on('type_product');

    });
    echo "success";

});

Route::get('modifyle-table-type-product',function(){

    Schema::table('type_product',function($table){
        $table->renameColumn('update_at','create_at');
        $table->datetime('create_at')->change();
    });
    echo "success";
});


Route::get('drop-product',function(){

    Schema::drop('product');
    Schema::dropIfExists('product');
    
    echo "success";
});
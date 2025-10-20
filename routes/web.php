<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('hello/', function () {
    return "hello mousa";
});
Route::get('user/{id}', function ($id) {
    return "hello user $id";
});
Route::get('user/{name?}', function ($name = 'mousa') {
    return "hello user $name";
})->name('user_name');

Route::get("product/{product_id?}/catigory/{catigory_id?}", function ($product_id = '11', $catigory_id = 'farag') {
    return "hello product $product_id and catigory $catigory_id";
})->where("product_id", "[0-9]+")->where("catigory_id", "[A-Za-z]+")->name('product_catigory');

// Route::get("/home",function(){
//     $name='ahmed';
//     return view('inc.home',compact('name'));
// });
Route::get("/home",function(){
    $name='ahmed';
    return view('inc.home',['name'=>'ahmedlfjal','age'=>'mosua','skils'=>['ahmed','farag','mohamed']]);
})->name('home');
Route::get("/about",function(){
    return view('inc.about');
})->name('about');
Route::get("/contact",function(){
    return view('inc.contact');
})->name('contact');
Route::get("/post",function(){
    return view('inc.post');
})->name('post');

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
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
//____________________________________________
//models
//_______
Route::get("/create",function(){
    // Post::create([
    //     'user_id'=>1,
    //     'title'=>'title from orm',
    //     'content'=>'this my world use orm',
    // ]);
    // return 'done';
    $post=Post::all()->pluck('title');
    dd($post);
    return $post;
});


// Route::get('/userProfile',function(){
// //    $user= User::create(
// //         [
// //             'name'=>'mousa',
// //             'email'=>'mousa@gmail.com',
// //             'password'=>Hash::make('123456')
// //         ]
// //         );
// $user=User::find(4);
// // dd($user->profile?->phone);
// $user = new User();
// $user->name='44444';
// $user->email='5555555@gmail.com';
// $user->password=Hash::make('123456');
// $user->save();
//         $user->profile()->create([
//             'phone'=>'01285555555',
//             'address'=>'damas',
//             'bio'=>'i am mousa'
//         ]);
//         return $user;
// });

Route::get('/posts',function(){
   $user=User::find(4);
   $user->posts()->createMany([
    [
        'title'=>'title from orm',
        'content'=>'this my world use orm',
    ],
    [
        'title'=>'title from orm',
        'content'=>'this my world use orm',
    ],
    [
        'title'=>'title from orm',
        'content'=>'this my world use orm',
    ],

   ]) ;
   return $user->posts;
    
});

Route::get('/category',function(){
  $post=Post::find(1);
  $categories=Category::where('name',['php','larave'])->get();
$post->categories()->attach($categories->pluck('id'));
// $post->categories()->sync($categories->pluck('id'));
return $post;
});















//insert into posts ('title','body','user_id') values ('title','body','user_id');
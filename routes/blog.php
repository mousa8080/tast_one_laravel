<?php

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;
use Monolog\Handler\RotatingFileHandler;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('hello/', function () {
//     return "hello mousa";
// });
// Route::get('user/{id}', function ($id) {
//     return "hello user $id";
// });
// Route::get('user/{name?}', function ($name = 'mousa') {
//     return "hello user $name";
// })->name('user_name');

// Route::get("product/{product_id?}/catigory/{catigory_id?}", function ($product_id = '11', $catigory_id = 'farag') {
//     return "hello product $product_id and catigory $catigory_id";
// })->where("product_id", "[0-9]+")->where("catigory_id", "[A-Za-z]+")->name('product_catigory');
// _______________________________________________________________________________________
//____________________________________________
Route::group([
    // 'middleware'=>IsAdminMiddleware::class,
    // 'prefix'=>'admin'
], function () {
    Route::get("/", [PageController::class, 'home'])->name('home');
    Route::get("/create_post", [PageController::class, 'create_post'])->name('create_post');
    Route::post("/store_post", [PageController::class, 'store_post'])->name('store_post');
    Route::get("/about", [PageController::class, 'about'])->name('about');
    Route::get("/contact", [PageController::class, 'contact'])->name('contact');
    Route::get("/post", [PageController::class, 'post'])->name('post');
});

// Route::controller(PageController::class)->group(function(){
//     Route::get("/home", 'home')->name('home');
//     Route::get("/about", 'about')->name('about');
//     Route::get("/contact", 'contact')->name('contact');
//     Route::get("/post", 'post')->name('post');
// });

// _______________________________________________________________________________________








//models
//_______
Route::get("/create", function () {
    // Post::create([
    //     'user_id'=>1,
    //     'title'=>'title from orm',
    //     'content'=>'this my world use orm',
    // ]);
    // return 'done';
    $post = Post::all()->pluck('title');
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

Route::get('/posts', function () {
    $user = User::find(4);
    $user->posts()->createMany([
        [
            'title' => 'title from orm',
            'content' => 'this my world use orm',
        ],
        [
            'title' => 'title from orm',
            'content' => 'this my world use orm',
        ],
        [
            'title' => 'title from orm',
            'content' => 'this my world use orm',
        ],

    ]);
    return $user->posts;
});

Route::get('/category', function () {
    $post = Post::find(1);
    $categories = Category::where('name', ['php', 'larave'])->get();
    $post->categories()->attach($categories->pluck('id'));
    // $post->categories()->sync($categories->pluck('id'));
    return $post;
});



Route::get("user_posts", function () {
    // $post=Post::with('user')->get();
    // dd($post);
    // foreach($post as $posts){
    //     dd( $posts->user?->name ."<br>");
    // }

    // $posts=DB::table('posts')->get();
    // $posts=DB::table('posts')->where('id',"=",1)->value('content');
    $posts = DB::table('posts')->insert(
        [
            'title' => 'title from orm',
            'content' => 'this my world use orm',
            'slug' => 'ahmed'
        ],
    );
    $posts = DB::table('posts')->where('id', 4)->update(
        [
            'title' => 'title from orm',
            'content' => 'this my world use orm',
            'slug' => 'ahmed'
        ],
    );
    $posts = DB::table('posts')->where('id', 4)->delete();
    dd($posts);
});


Route::get('/faker_posts', function () {
    // Post::query()->delete();
    $posts = Post::factory(1)->create();

    foreach ($posts as $post) {
        echo "$post .<br>";
    }
});
//insert into posts ('title','body','user_id') values ('title','body','user_id');
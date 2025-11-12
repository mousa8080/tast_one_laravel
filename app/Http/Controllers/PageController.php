<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
// use Illuminate\Auth\Middleware\Authorize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    // use Authorize;
    public function __construct()
    {
        // $this->middleware(IsAdminMiddleware::class);
    }
    public function home()
    {
        return view('inc.home');
    }

    public function about()
    {
        return view('inc.about');
    }

    public function contact()
    {
        return view('inc.contact');
    }

    // public function post()
    // {
    //     $this->authorize('create-post',Post::class);
    //     abort(403);
    // }
    public function post(CreatePostRequest $request)
    {
        // if(Gate::allows('create-post')){
        //  return view('inc.post');
        // }
        // $data = $request->validated();

        // Post::create($data);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    // public function create_post()
    // {
    //     return view('inc.create_post');
    // }
}

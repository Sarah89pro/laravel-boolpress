<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //Get Blog Posts

    public function index() {
        //$posts= Post::all();
        $posts = Post::paginate(2);

        return response()->json($posts);
    }

    //Get post detail by slug
    public function show ($slug) {
        //dump($slug);
        $post=Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; //slug
use Illuminate\Validation\Rule; //validation
use App\Post;
use App\Category; //add Category

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all posts
        $posts= Post::all();

        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        
        return view ('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request-> validate([
            'title'=> 'required|unique:posts|max:50',
            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id'
        ],
        [
            'required'=> 'The :attribute is required!',
            'unique' => 'The :attribute is already used',
            'max' => 'Max :max characters allowed for the :attribute'
        ]
    
    );

        $data=$request->all();
        //slug
        $data['slug']=Str::slug($data['title'], '-');

        //create e save records on db
        $new_post=new Post();

        //fillable in Post
        $new_post->fill($data);

        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //single post
        $post= Post::find($id);

        if(! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit post
        $post= Post::find($id);

        $categories= Category::all();

        if(! $post) {
            abort(404);
        }

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'title'=> [
                'required',
                Rule::unique('posts')->ignore($id),
                'max:50'
            ],

            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id'
        ],
        
        [
            'required'=> 'The :attribute is required!',
            'unique'=> 'This :attribute is already used',
            'max' => 'you have exceeded the :max characters allowed for the :attribute'
        ]);

        $data= $request->all();

        $post = Post::find($id);
        
        //slug
        if($data['title'] != $post->title) {
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $post->update($data); //fillable

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete posts
        $post= Post::find($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; //slug
use Illuminate\Validation\Rule; //validation
use Illuminate\Support\Facades\Storage; //storage
use App\Post;
use App\Category; //add Category
use App\Tag; //add Tag

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
        $categories= Category::all();

        return view ('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $tags = Tag::all();
        
        return view ('admin.posts.create', compact('categories', 'tags'));
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
            'title'=> 'required|unique:posts|max:80',
            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'cover' =>'nullable|mimes:jpg,png,jpeg'
        ],
        [
            'required'=> 'The :attribute is required!',
            'unique' => 'The :attribute is already used',
            'max' => 'Max :max characters allowed for the :attribute'
        ]
    
    );

        $data=$request->all();
        //dd($data);

        //Add Cover Image ( if exists)
        if(array_key_exists('cover', $data)) {
            $img_path=Storage::put('posts-covers', $data['cover']);

            //overwrite cover with file path
            $data['cover']=$img_path; //Url
        }



        //slug
        $data['slug']=Str::slug($data['title'], '-');

        //create e save records on db
        $new_post=new Post();

        //fillable in Post
        $new_post->fill($data);

        //save
        $new_post->save();


        //Save Tags Relation in Pivot Table
        if(array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']); //add new records in the Pivot Table
        }

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

        //tags
        $tags = Tag::all();

        if(! $post) {
            abort(404);
        }

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
                'max:80'
            ],

            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'cover' => 'nullable|mimes:jpg,png,jpeg'
        ],
        
        [
            'required'=> 'The :attribute is required!',
            'unique'=> 'This :attribute is already used',
            'max' => 'you have exceeded the :max characters allowed for the :attribute'
        ]);

        $data= $request->all();

        $post = Post::find($id);

        //Image update
        if (array_key_exists('cover', $data)) {
            //delete previous
            if ($post->cover) {
                Storage::delete($post->cover);
            }
            //set new one
            //$img_path = Storage::put('posts-covers', $data['cover']);
            $data['cover']= Storage::put('posts-covers', $data['cover']);
        }
        
        //slug
        if($data['title'] != $post->title) {
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $post->update($data); //fillable


        //update Pivot Table Relation
        if(\array_key_exists('tags', $data)) {
            //add record to the table
            $post->tags()->sync($data['tags']); //add or remove update
        }
            else {
                $post->tags()->detach(); //remove all records from the Pivot Table
            }

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
        $post= Post::find($id);

        //Removal Image
        if ($post->cover) {
            Storage::delete($post->cover);
        }


        //cleaning orphans from Pivot Table
        $post->tags()->detach();

        //delete posts
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}

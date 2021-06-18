@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Posts</h1>

    <!--Create-->
    <a class=" mb-5 btn btn-primary" href="{{ route('admin.posts.create')}}">Create New Post</a>
    
    <!--table for data posts-->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->title}}</td>
                    <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->id)}}">SHOW</a></td> 
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>


</div>

@endsection
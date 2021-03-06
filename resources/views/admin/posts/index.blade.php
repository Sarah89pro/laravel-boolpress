@extends('layouts.app')

@section('content')

<div class="container">

    {{-- session --}}
    @if (session('deleted'))
        <div class="alert alert-success">
            <strong>{{ session('deleted') }}</strong>
            Post deleted!
        </div>
    @endif

    <h1>Posts</h1>

    <!--Create-->
    <a class=" mb-5 btn btn-primary" href="{{ route('admin.posts.create')}}">Create New Post</a>
    
    <!--table for data posts-->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->title}}</td>
                    <td>
                        @if ($post->category) {{ $post->category->name }} @endif
                    </td>

                    
                    <td>
                        <div>{{$post->created_at->format('d/m/y')}}</div>
                        <div>{{$post->created_at->diffForHumans()}}</div>
                    </td>

                    <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->id)}}">SHOW</a></td> 
                    <td><a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id)}}">EDIT</a></td>
                    <td><form class="delete-post-form" action="{{ route('admin.posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input class="btn btn-danger" type="submit" value="DELETE">
                    </form></td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

    {{-- Get Posts by category --}}
    <h2>Posts by Category</h2>
    @foreach ($categories as $category)
    <h3 class="mt-4"> {{ $category->name }}</h3>

    @forelse ($category->posts as $post)
    <h4><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h4>
    
    @empty
    <span>No posts here! <a href="">Why don't you write something about it?</a></span>
    
    @endforelse

    @endforeach

</div>

@endsection
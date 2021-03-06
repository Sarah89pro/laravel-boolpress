@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$post->title}}</h1>


    {{-- @dump($post->category()) useful to see the relation --}}
    {{-- @dump($post->category) useful to see the Object --}}
    
    {{-- add Category --}}
    @if ($post->category)
    <h3>Category: {{ $post->category->name }}</h3>
    @endif
    

    <div class="mb-5">
        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit Post</a>
    </div>

    {{-- Cover Image --}}
    <div class="mb-5 row">
        @if ($post->cover)
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('storage/' . $post->cover) }}" alt="{{$post->title}}">
            </div>
        @endif
        
        <div class="{{ ($post->cover==null) ? 'col' : 'col-md-6' }}">
            <p>{{$post->content}}</p>
        </div>
        
    </div>

    


    {{-- add Tags --}}
    @if (count($post->tags) >0)
        <h4>Tags</h4>
        @foreach ($post->tags as $tag )
            <span class="badge badge-primary"> {{ $tag->name }} </span>
        @endforeach
    @endif
</div>
    
@endsection
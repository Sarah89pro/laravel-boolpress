@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$post->title}}</h1>

    <div class="mb-5">
        <a class="btn btn-warning" href="#">Edit Post</a>
    </div>

    <p>{{$post->content}}</p>
</div>
    
@endsection
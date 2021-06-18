@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">

            
                <form action="{{ route('admin.posts.update', $post->id)}}" method="POST">
                @csrf
                @method('PATCH')


                
                <div>
                    <label class="form-label" for="title">Title*</label>
                    <input class="form-control @error('title')
                        is-invalid
                    @enderror" type="text" id="title" name="title" value="{{old('title', $post->title)}}">
                </div>

                <div>
                    <label class="form-label" for="content">Content*</label>
                    <textarea class="form-control @error('content')
                    is-invalid
                @enderror" name="content" id="content" cols="30" rows="10" >{{old('content', $post->content)}}"</textarea>
                </div>

                <button class="mt-5 btn btn-primary" type="submit">Update Post</button>
                </form>
            </div>
        </div>
    </div>

    
    
@endsection
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('admin.posts.store')}}" method="POST">
                @csrf
                @method('POST')

                <div>
                    <label class="form-label" for="title">Title*</label>
                    <input class="form-control" type="text" id="title" name="title">
                </div>

                <div>
                    <label class="form-label" for="content">Content*</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                </div>

                <button class="mt-5 btn btn-primary" type="submit">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
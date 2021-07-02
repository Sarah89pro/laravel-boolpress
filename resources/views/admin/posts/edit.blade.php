@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">

            
                <form action="{{ route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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
                @enderror" name="content" id="content" cols="30" rows="10" >{{old('content', $post->content)}}</textarea>
                </div>


                {{--Add Category--}}
                <div class="mb-3">
                    <label for="category_id">Category</label>
                    <select class="form-control @error('category_id')
                    is-invalid
                @enderror"
                    name="category_id" id="category_id">
                        <option value="">Select Category</option>

                        @foreach ($categories as $category )
                        <option value= "{{ $category->id }}"
                            @if ($category->id ==old('category_id', $post->category_id)) selected   
                            @endif>
                        {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{--Add Tags--}}
                <h4>Tags</h4>
                <div class="mb-3">

                    @foreach ($tags as $tag)
                    <span class="d-inline-block mr-3">
                        <input type="checkbox" name="tags[]" id="tag {{ $loop->iteration }}" value="{{ $tag->id}}"
                        
                        @if ($errors->any() && in_array($tag->id, old('tags'))) 
                            checked
                        @elseif (! $errors->any() && $post->tags->contains($tag->id))
                            checked    
                        @endif>

                        <label for="tag {{ $loop->iteration }}"> {{ $tag->name }} </label>
                    </span>
                    @endforeach

                    @error('tags')
                    <div>{{ $message }}</div>
                        
                    @enderror

                </div>
                

                {{-- Add Post Image --}}
                <div class="mb-3">
                    <div>
                        <label for="cover" class="form-label">Post Image</label>
                    </div>

                    @if ($post->cover)
                    <div class="mb-3">
                        <img width="200" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                    </div>
                    @endif

                    <input type="file" name="cover" id="cover">
                    @error('cover')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <button class="mt-5 btn btn-primary" type="submit">Update Post</button>
                </form>
            </div>
        </div>
    </div>

    
    
@endsection
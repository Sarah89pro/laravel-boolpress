@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">

                {{-- @if ($errors->any())
                <div class="alert alert-danger mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                            
                        @endforeach
                    </ul>

                </div>
                    
                @endif --}}


                <form action="{{ route('admin.posts.store')}}" method="POST">
                @csrf
                @method('POST')


                
                <div>
                    <label class="form-label" for="title">Title*</label>
                    <input class="form-control @error('title')
                        is-invalid
                    @enderror" type="text" id="title" name="title" value="{{old('title')}}">
                </div>
                {{-- @error('title')
                    <p class="mt-3 alert alert-danger">{{ $message }}</p>
                @enderror --}}

                <div>
                    <label class="form-label" for="content">Content*</label>
                    <textarea class="form-control @error('content')
                    is-invalid
                @enderror" name="content" id="content" cols="30" rows="10" >{{old('content')}}"</textarea>
                </div>

                {{-- @error('content')
                    <p class="mt-3 alert alert-danger">{{ $message }}</p>
                @enderror --}}

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
                            @if ($category->id ==old('category_id')) selected   
                            @endif>
                        {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button class="mt-5 btn btn-primary" type="submit">Create Post</button>
                </form>
            </div>
        </div>
    </div>

    
@endsection
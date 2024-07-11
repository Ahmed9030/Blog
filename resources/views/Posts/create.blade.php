@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)

                        <ul class="nav justify-content-center text-bg-danger p-3">
                        @foreach ($errors->all() as $error)
                            <li class="nav-item">
                                <p>{{$error}}</p>
                            </li>
                        @endforeach
                        </ul>
                    @endif

                     {{-- success message --}}
                     @if ($message = Session::get("success"))
                      <p class="text-bg-success p-2">{{$message}}</p>
                     @endif

                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tiltle</label>
                          <input type="text" name="title" class="form-control" >
                          <div  class="form-text">Type the post title name.</div>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Chooce the category of this post</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-check">
                            @foreach ($tags as $tag)
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}">
                            <label class="form-check-label">
                              {{$tag->title}}
                            </label>
                            <br>
                            @endforeach
                          </div>

                        <div class="mb-3">
                          <label  class="form-label">Image</label>
                          <input type="file" name="image" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea name="description" id="classic-editor" rows="10" cols="50" class="form-control"></textarea>
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Content</label>
                            <textarea name="content" id="editor-content" rows="10" cols="50" class="form-control"></textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">Uplode Post</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

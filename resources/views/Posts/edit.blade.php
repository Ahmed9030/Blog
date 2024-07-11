@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post '{'{{$post->title}}'}'</div>

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

                    <form action="{{route('post.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tiltle</label>
                          <input type="text" name="title" class="form-control" value="{{$post->title}}" >
                          <div  class="form-text">Type the post title name.</div>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"@if ($post->category_id === $category->id) selected @endif >{{$category->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-check">
                            @foreach ($tags as $tag)
                            <input class="form-check-input" type="checkbox"
                            @foreach ($post->tags as $ta)
                                @if($tag->id == $ta->id)
                                    checked
                                @endif
                            @endforeach
                            name="tags[]" value="{{$tag->id}}">
                            <label class="form-check-label">
                              {{$tag->title}}
                            </label>
                            <br>
                            @endforeach
                          </div>

                        <div class="mb-3">
                          <label  class="form-label">Image</label>
                          <input type="file" name="image" class="form-control" >
                          <img src="/images/posts/{{$post->image}}" alt="" class="img-fluid mt-2" width= "150px" style="border-radius: 13px;">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea name="description" id="classic-editor" rows="5" class="form-control">{{$post->description}}</textarea>
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Content</label>
                            <textarea name="content" id="editor-content" rows="5" class="form-control">{{$post->content}}</textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">Update Post</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

@endsection


@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
    $(document).ready(function() {
      $('#content').summernote();
    });
</script>



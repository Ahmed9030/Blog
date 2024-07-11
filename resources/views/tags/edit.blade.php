@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tga {{$tag->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- success message --}}
                    @if ($message = Session::get("success"))
                        <p class="text-bg-success p-2">{{$message}}</p>
                    @endif

                    <form action="{{route('tag.update' , $tag->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="title" class="form-label">Tga Name</label>
                          <input type="text" name="title" class="form-control" value="{{$tag->title}}" >
                          <div  class="form-text">Type the name of tag.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

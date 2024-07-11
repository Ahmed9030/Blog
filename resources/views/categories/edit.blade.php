@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

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

                    <form action="{{route('category.update' , $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Category Name</label>
                          <input type="text" name="name" class="form-control" value="{{$category->name}}" >
                          <div  class="form-text">Type the name of category.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" rows="5" class="form-control">{{$category->description}}</textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

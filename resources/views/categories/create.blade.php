@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- error messages --}}
                    @if (count($errors) > 0)
                        <ul class="nav justify-content-center text-bg-danger p-2">
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

                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Category Name</label>
                          <input type="text" name="name" class="form-control" >
                          <div  class="form-text">Type the name of category.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" rows="5" class="form-control"></textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

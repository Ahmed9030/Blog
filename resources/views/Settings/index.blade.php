@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Settings</div>

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

                    <form action="{{route('settings.update')}}" method="POST" >
                        @csrf

                        <div class="mb-3">
                          <label for="blog_name" class="form-label">Blod Name</label>
                          <input type="text" name="blog_name" class="form-control" value="{{$settings->blog_name}}">
                          <div  class="form-text">Edit the name of Your Blog.</div>
                        </div>

                        <div class="mb-3">
                          <label for="phone_number" class="form-label">Phone Number</label>
                          <input type="text" name="blog_phone" class="form-control" value="{{$settings->blog_phone}}">
                        </div>

                        <div class="mb-3">
                          <label for="blog_email" class="form-label">Email</label>
                          <input type="text" name="blog_email" class="form-control" value="{{$settings->blog_email}}">
                        </div>

                        <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" value="{{$settings->address}}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" rows="5" class="form-control">{{$settings->description}}</textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

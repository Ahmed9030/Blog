@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New User</div>

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

                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" >
                          <div  class="form-text">Type the User name.</div>
                        </div>

                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" name="email" class="form-control" >
                          <div  class="form-text">Type the User email , importent for login.</div>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Chooce the Type of user</label>
                            <select class="form-select" aria-label="Default select example" name="admin">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                              </select>
                        </div>

                        <div class="mb-3">
                          <label  class="form-label">Image</label>
                          <input type="file" name="image" class="form-control" >
                        </div>

                        {{-- <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name = 'password' placeholder="password">
                              </div>
                        </div> --}}


                        <button type="submit" class="btn btn-primary">Create User</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

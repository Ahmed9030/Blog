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

                    <form action="{{route('profile.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user->profile->avatar))
                        <img src="{{asset('images/avatar/' . $user->profile->avatar)}}" width="50px" class="mb-3" alt="user avatar">
                        @else
                        <img src="{{asset('/images/avatar/1.webp')}}" width="50px" class="mb-3" alt="user avatar">
                        @endif
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" value="{{$user->name}}">
                          <div  class="form-text">Type the User name.</div>
                        </div>

                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$user->email}}" >
                          <div  class="form-text">Type the User email , importent for login.</div>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Chooce the Type of user</label>
                            <select class="form-select" aria-label="Default select example" name="admin">

                                <option value="0" @if ($user->admin === 0 ) selected @endif >User</option>
                                <option value="1" @if ($user->admin === 1 ) selected @endif >Admin</option>
                              </select>
                        </div>

                        <div class="mb-3">
                          <label  class="form-label">Image</label>
                          <input type="file" name="avatar" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name = 'password'  placeholder="password">
                              </div>
                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" @if(isset($user->profile->facebook)) value="{{$user->profile->facebook}}" @endif>
                            <div  class="form-text">ENter the User facebook URL.</div>
                          </div>

                        <div class="mb-3">
                            <label for="x" class="form-label">X</label>
                            <input type="text" name="x" class="form-control" @if(isset($user->profile->x)) value="{{$user->profile->x}}" @endif>
                            <div  class="form-text">ENter the User X URL.</div>
                          </div>

                        <div class="mb-3">
                            <label for="github" class="form-label">Github</label>
                            <input type="text" name="github" class="form-control" @if(isset($user->profile->github)) value="{{$user->profile->github}}" @endif>
                            <div  class="form-text">ENter the User  github URL .</div>
                          </div>

                          <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea name="about" id="classic-editor" rows="5" class="form-control">{{$user->profile->about}}</textarea>
                          </div>



                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

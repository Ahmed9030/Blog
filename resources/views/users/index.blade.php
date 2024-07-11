@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-3">users</div>

                <div class="card-body">

                    {{-- success message --}}
                    @if ($message = Session::get("success"))
                        <p class="text-bg-success p-2">{{$message}}</p>
                    @endif

                    @if($users->count() > 0 )
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">

                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>
                                    @if (isset($user->profile->avatar))
                                    <img src="/images/avatar/{{$user->profile->avatar}}" alt="" class="img-fluid" width= "50px" style="border-radius: 13px;">
                                    @else
                                    <img src="/images/avatar/1.webp" alt="" class="img-fluid" width= "50px" style="border-radius: 13px;">
                                    @endif
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->admin === 1)
                                            <a href="{{route('user.delete.admin', $user->id)}}" class="text-danger">Delete Admin</a>
                                        @else
                                            <a href="{{route('user.admin', $user->id)}}">Make Admin</a>
                                        @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary ">Edit</a>
                                        <a href="{{route('user.delete' ,$user->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table>
                      @else
                      <p class="text-center fs-3">There's no users yet!</p>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

                    {{-- success message --}}
                    @if ($message = Session::get("success"))
                        <p class="text-bg-success p-2">{{$message}}</p>
                    @endif

                    @if($posts->count() > 0 )
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Update At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">

                                @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->title}}</td>
                                    <td><img src="/images/posts/{{$post->image}}" alt="" class="img-fluid" width= "150px" style="border-radius: 13px;"></td>
                                    <td>{{$post->created_at}}</td>
                                    <td>{{$post->updated_at}}</td>
                                    <td>
                                        <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary ">Edit</a>
                                        <a href="{{route('post.delete' ,$post->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                      </table>
                      @else
                      <p class="text-center fs-3">There's no posts yet!</p>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

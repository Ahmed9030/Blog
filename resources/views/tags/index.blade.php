@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">

                    {{-- success message --}}
                    @if ($message = Session::get("success"))
                        <p class="text-bg-success p-2">{{$message}}</p>
                    @endif

                    @if($tags->count() > 0)
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Update At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($tags as $tag)
                            <tr>
                                <th scope="row">{{$tag->id}}</th>
                                <td>{{$tag->title}}</td>
                                <td>{{$tag->created_at}}</td>
                                <td>{{$tag->updated_at}}</td>
                                <td>
                                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-primary ">Edit</a>
                                    <a href="{{route('tag.delete' ,$tag->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      @else
                        <p class="text-center fs-3">There's no tags yet!</p>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="total-revenue-chart"></div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$users->count()}}</span></h4>
                                        <p class="text-muted mb-0">Users</p>
                                    </div>
                                   <a href="members.php"> <p class="text-muted mt-3 mb-0">View All</p></a>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="orders-chart"> </div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$posts->count()}}</span></h4>
                                        <p class="text-muted mb-0">Posts</p>
                                    </div>
                                    <a href="subscribe.php"> <p class="text-muted mt-3 mb-0">View All<</p></a>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="customers-chart"> </div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$tags->count()}}</span></h4>
                                        <p class="text-muted mb-0">Tags</p>
                                    </div>
                                    <a href="courses.php"> <p class="text-muted mt-3 mb-0">View All<</p></a>
                                </div>
                            </div>
                        </div> <!-- end col-->


                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="growth-chart"></div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$categories->count()}}</span></h4>
                                        <p class="text-muted mb-0">Categoryies</p>
                                    </div>
                                    <a href="items.php"> <p class="text-muted mt-3 mb-0">View All<</p></a>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <div id="growth-chart"></div>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$posts_trashed->count()}}</span></h4>
                                        <p class="text-muted mb-0">Trashed Posts</p>
                                    </div>
                                    <a href="items.php"> <p class="text-muted mt-3 mb-0">View All<</p></a>
                                </div>
                            </div>
                        </div> <!-- end col-->



                    </div> <!-- end row-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

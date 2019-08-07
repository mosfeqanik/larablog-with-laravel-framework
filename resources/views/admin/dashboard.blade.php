@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">


            @if(Auth::user() && Auth::user()->role_id === 1 )
                <h1>Admin Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 2)
                <h1>Author Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 3)
                <h1>Subscribe Dashboard</h1>
            @endif
        </div>
        @if(Auth::user() && Auth::user()->role_id === 1 )
        <div class="col-md-12">
            <a href="{{route('blog.create')}}" class="text-white btn btn-primary btn-margin-right"> Create Blog</a>

            <a href="{{route('blog.trash')}}" class="text-white btn btn-danger btn-margin-right">Trashed Blog</a>

            <a href="{{route('category.create')}}" class="btn btn-success btn-margin-right text-white">Create Category</a>

            <a href="{{route('admin.blogs')}}" class="btn btn-warning btn-margin-right text-white">Publish Blogs</a>
        </div>
        @elseif(Auth::user() && Auth::user()->role_id === 2 )
        <div class="col-md-12">
            <a href="{{route('blog.create')}}" class="text-white btn btn-primary btn-margin-right"> Create Blog</a>

            <a href="{{route('category.create')}}" class="btn btn-success btn-margin-right text-white">Create Category</a>
        </div>
        @elseif(Auth::user() && Auth::user()->role_id === 3 )
            <div class="col-md-12">
                <a href="#" class="text-white btn btn-primary btn-margin-right"> What can I do?</a>
            </div>
        @endif
    </div>
@endsection
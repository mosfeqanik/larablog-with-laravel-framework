@extends('layouts.app')

@include('partials.meta_static')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Manage Blogs</h2>
        </div>

        <div class="row">
            <div class="col-md-6 w-4">
                <h2>Published Blogs</h2>
                @foreach($publishedBlogs as $blog)
                    <h1><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h1>
                    {{--{{$blog->body}}--}}
                    {!!Illuminate\Support\Str::limit($blog->body,100)!!}
                    <form action="{{route('blog.update',$blog->id)}}" method="post">
                        {{method_field('patch')}}
                            <input name="status" type="checkbox" value="0" checked style="display: none;">
                            <button type="submit" class="btn btn-warning btn-sm">save as draft</button>
                        {{csrf_field()}}
                    </form>
                @endforeach
            </div>
            <div class="col-md-6 w-4">
                <h2>Draft Blogs</h2>
                @foreach($draftsBlogs as $blog)
                    <h1><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h1>
                    {{--{{$blog->body}}--}}
                    {!!Illuminate\Support\Str::limit($blog->body,100)!!}
                    <form action="{{route('blog.update',$blog->id)}}" method="post">
                        {{method_field('patch')}}
                        <input name="status" type="checkbox" value="1" checked style="display: none;">
                        <button type="submit" class="btn btn-success btn-sm">Publish</button>
                        {{csrf_field()}}
                    </form>
                @endforeach
            </div>
    </div>

    </div>


@endsection
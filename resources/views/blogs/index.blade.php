@extends('layouts.app')

@include('partials.meta_static')
@section('content')
    <div class="container">
        @foreach($blogs as $blog)
            <h1><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h1>
            {{--{{$blog->body}}--}}
            {!!$blog->body!!}
            {{$blog->blog_user->name}}
            @if($blog->blog_user)
                dd($blog->blog_user->name)
                Author: <a href="#">{{$blog->blog_user->name}}</a>
                    |posted:{{$blog->created_at->diffForHumans()}}
            @endif
        @endforeach
    </div>
@endsection
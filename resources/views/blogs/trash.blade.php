@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Trashed Blogs</h1>
        </div>
    </div>
    @foreach($trashedBlogs as $blog)
    <div class="col-md-12 ">
            <h1>{{$blog->title}}</h1>
            <p>{{$blog->body}}</p>
        <div class="btn-group">
            {{--restore--}}
            <form action="{{route('blog.restore',$blog->id)}}" method="GET">
                {{csrf_field()}}
                <button class="btn btn-success " type="submit">
                    Restore
                </button>

            </form>
            {{--delete--}}
            <form action="{{route('blog.pernamentDelete',$blog->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
                <button class="btn btn-danger " type="submit">
                    Permanent Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach


@endsection
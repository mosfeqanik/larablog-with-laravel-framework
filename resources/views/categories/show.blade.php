@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>{{$category->name}}</h1>
            <div class="btn-group">
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning btn-sm btn-margin-right">Edit</a>

                <form action="{{route('category.destroy',$category->id)}}" method="POST">
                    {{method_field('delete')}}
                    <button class="btn btn-danger btn-sm btn-margin-right" type="submit">
                        Delete
                    </button>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
        <div class="col-md-12">
            @foreach($category->blog as $blog)
                <h3><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h3>
            @endforeach
        </div>
    </div>
@endsection
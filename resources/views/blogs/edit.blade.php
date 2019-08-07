@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h2> Edit</h2>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-"8>
            <form action="{{route('blog.update',$blog->id)}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" placeholder="Body" class="form-control">{{$blog->body}}</textarea>
                </div>
                <div class="form-group form-check form-check-inline">
                    {{ $blog->category->count() ? 'Current Category : ' : ' ' }} &nbsp
                    @foreach($blog->category as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]" checked>
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>
                <div class="form-group form-check form-check-inline">
                    {{ $filltedArray->count() ? 'unused Category : ' : ' ' }} &nbsp
                    @foreach($filltedArray as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]" >
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>

    </div>
@endsection
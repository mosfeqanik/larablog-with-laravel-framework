@extends('layouts.app')
@include('partials.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h2> Create a Blog</h2>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-"8>
            <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                    {{--<textarea name="body" placeholder="Body" class="form-control"></textarea>--}}
                </div>

                <div class="form-group form-check form-check-inline">
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]">
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Create A New Blog</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>

    </div>
@endsection
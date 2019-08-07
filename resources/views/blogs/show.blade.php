@extends('layouts.app')

@include('partials.meta_dynamic')
{{--@section('meta_tittle')--}}
    {{--{{$blog->meta_title}}--}}
{{--@endsection--}}

{{--@section('meta_description')--}}
    {{--{{$blog->meta_description}}--}}
{{--@endsection--}}
@section('content')
    <div class="container-fluid">

        <article>
            <div class="jumbotron">
                <div class="col-md-12">
                    @if($blog->featured_image)
                        {{--<img src="{{asset('images/Featured_Images/'.$blog->featured_image)}}" alt="{{}}">--}}
                        {{--<img src="/images/Featured_Images/{{$blog->featured_image ? $blog->featured_image: ' ' }}" alt="{{Illuminate\Support\Str::limit($blog->title,50)}}"--}}
                        {{--class="img-fluid featured_image">--}}
                        <img src="{{asset('images/Featured_Images/'.$blog->featured_image)}}" alt="{{$blog->featured_image}}" class="img-fluid featured_image" >
                    @endif    
                </div>
                <div class="col-md-12">
                    <h2> {{$blog->title}}</h2>
                </div>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="{{route('blog.edit',$blog->id)}}">Edit</a>
                    <form action="{{route('blog.delete',$blog->id)}}" method="post">
                        {{method_field('Delete')}}
                        <button class="btn btn-danger btn-sm btn-margin-right" type="submit">
                            Delete
                        </button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                    <articles>
{{--                        {{$blog->body}}--}}
                        {!! $blog->body !!}
                        <hr>
                        <strong>Categories</strong>
                        @foreach($blog->category as $category)
                            <span><a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a></span>
                        @endforeach
                    </articles>
            </div>
            <div class="col-md-2"></div>
        </article>
    </div>
@endsection
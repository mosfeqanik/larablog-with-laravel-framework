@extends('layouts.app')

@section('content')
    <div class="contrainer">
        @foreach($categories as $category)
            <h1><a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a></h1>
        @endforeach
    </div>
@endsection
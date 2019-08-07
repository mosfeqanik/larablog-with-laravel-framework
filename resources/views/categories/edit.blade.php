@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h2> Edit Category</h2>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-"8>
            <form action="{{route('category.update',$category->id)}}" method="POST">
                {{method_field('patch')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <button class="btn btn-primary" type="submit">Update Category</button>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-md-2"></div>

    </div>
@endsection
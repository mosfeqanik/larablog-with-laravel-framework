@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h2> Create Category</h2>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-"8>
            <form action="{{route('category.store')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Create A New Category</button>
            </form>
        </div>
        <div class="col-md-2"></div>

    </div>
@endsection
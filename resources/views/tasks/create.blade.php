@extends('master')

@section('content')

    @if($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif

    <form action="{{ route('tasks.store') }}" method="post">
        {{ csrf_field() }}

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Title</span>
            <input name="title" type="text" class="form-control" placeholder="Title">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </form>

@endsection
@extends('master')

@section('content')

    @if($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
        {{ csrf_field() }}

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Title</span>
            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $task->title }}">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </form>

@endsection
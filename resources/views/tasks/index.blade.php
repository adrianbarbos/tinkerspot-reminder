@extends('master')

@section('content')

    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <a
                    href="{{ route('tasks.toggle', ['task' => $task->id]) }}"
                    type="button" class="btn {{ $task->done ? 'btn-warning' : 'btn-success' }}">
                    @if($task->done)
                        Undone
                    @else
                        Done
                    @endif
                </a>
                <span @if($task->done) style="text-decoration: line-through" @endif>{{  $task->title }}</span>

                <button class="btn btn-danger pull-right" onclick="document.querySelector('#delete_{{ $task->id }}').submit()">Delete</button>
                <form style="display: none" id="delete_{{ $task->id }}" action="{{ route('tasks.delete', ['task' => $task->id ]) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                </form>

                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-default pull-right">Edit</a>
                <div class="clearfix"></div>
            </li>
        @endforeach
    </ul>

@endsection
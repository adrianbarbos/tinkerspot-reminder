<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('done', 'ASC')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function toggle(Task $task) {
        $task->update([
            'done' => !$task->done
        ]);

        return back();
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required|max:255'
        ]);

        Task::create(request()->only('title'));

        return redirect()->route('tasks');
    }

    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task) {
        $this->validate(request(), [
            'title' => 'required|max:255'
        ]);

        $task->update(request()->only('title'));

        return redirect()->route('tasks');
    }

    public function destroy(Task $task) {
        $task->delete();

        return back();
    }
}

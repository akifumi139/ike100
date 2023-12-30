<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function check($id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }

    public function edit($title)
    {
    }

    public function update($id, Request $request)
    {
    }

    public function destroy($id)
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create($projectId)
    {
        $project = Project::find($projectId);

        return view('tasks.create', compact("project"));
    }

    public function store($projectId, Request $request)
    {
        $project = Project::find($projectId);
        $project->tasks()->create(
            ['name' => $request->name]
        );

        return redirect()->route('projects.show', ['no' => $projectId]);
    }

    public function check($id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }

    public function edit($projectId, $taskId)
    {
        $project = Project::find($projectId);
        $task = Task::find($taskId);

        return view('tasks.edit', compact("project", "task"));
    }

    public function update($projectId, $taskId, Request $request)
    {
        $project = Project::find($projectId);

        $task = $project->tasks()->find($taskId);


        if ($request->filled('name')) {
            $task->update([
                'name' => $request->name
            ]);
        } else {
            $task->delete();
        }

        return redirect()->route('projects.show', ['no' => $projectId]);
    }
}

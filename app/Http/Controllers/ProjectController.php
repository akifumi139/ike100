<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        $projectBack = Project::where('id', $project->id - 1)->first();
        $projectNext = Project::where('id', $project->id + 1)->first();

        return view('projects.show', compact('project', 'projectBack', 'projectNext'));
    }

    public function check($id)
    {
        $project = Project::find($id);
        $project->completed = !$project->completed;
        $project->save();

        return redirect()->back();
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $endNo = Project::max('no');
        Project::create(
            [
                'no' => $endNo + 1,
                'title' => $request->title
            ]
        );

        return redirect()->route('projects.index');
    }

    public function edit($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.edit', compact('project'));
    }

    public function update($id, Request $request)
    {
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return redirect()->route('projects.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('top', compact('projects'));
    }

    public function show($title)
    {
        $project = Project::with('tasks')->where('title', $title)->first();

        $projectBack = Project::where('id', $project->id - 1)->first();
        $projectNext = Project::where('id', $project->id + 1)->first();

        return view('show', compact('project', 'projectBack', 'projectNext'));
    }


    //ダッシュボード用
    public function create()
    {
    }

    public function store(Request $request)
    {
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

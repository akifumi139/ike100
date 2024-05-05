<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;

use App\Http\Requests\Project\EditRequest;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', [
            'projects' => $projects
        ]);
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
                'title' => $request->title,
            ]
        );

        return redirect()->route('projects.index');
    }

    public function edit($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.edit', compact('project'));
    }

    public function update($no, EditRequest $request)
    {
        $project = Project::where('no', $no)->first();
        $params = $request->params();

        $params['link'] = $this->setEndCard($request, $project);

        $project->update($params);

        return to_route('projects.show', ['no' => $no]);
    }

    private function setEndCard($request, $project)
    {
        $link = $request->link;

        if (is_null($link)) {
            return null;
        }

        if ($request->hasFile('link')) {
            return Image::upload($request, 'link', 'projects');
        }

        if (!(strpos($link, 'https://youtu.be/') === false)) {
            return str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $link);
        }
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return to_route('projects.index');
    }
}

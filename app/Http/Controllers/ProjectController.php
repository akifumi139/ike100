<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Project\EditRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

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
        $params['image'] = $this->uploadImage('image', $request, $project);

        $params['link'] = $this->setEndCard($request, $project);

        $project->update($params);

        return redirect()->route('projects.show', ['no' => $no]);
    }

    private function uploadImage($path, $request, $project)
    {
        if (is_null($request->file($path))) {
            return $project->image;
        }

        if ($project->images) {
            Storage::delete(str_replace('storage/', 'public/', $project->images));
        }

        $imagePath = $request->file($path)->store('tmp');

        $image = Image::read(storage_path("app/$imagePath"));
        $webpEncoded = $image->toWebp(80);

        $webpPath = 'public/projects/' . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';
        Storage::put($webpPath, $webpEncoded);

        return 'storage/projects/' . basename($webpPath);
    }

    private function setEndCard($request, $project)
    {
        $link = $request->link;

        if (is_null($link)) {
            return null;
        }

        if ($request->hasFile('link')) {
            $imagePath = $request->file('link')->store('tmp');

            $image = Image::read(storage_path("app/$imagePath"));
            $webpEncoded = $image->toWebp(80);

            $webpPath = 'public/projects/' . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';
            Storage::put($webpPath, $webpEncoded);

            return 'storage/projects/' . basename($webpPath);
        }

        if (strpos($link, 'https://youtu.be/') === false) {
            return null;
        }

        return str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $link);
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return redirect()->route('projects.index');
    }
}

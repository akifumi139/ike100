<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project;


use App\Http\Requests\Project\ImageAddRequest;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectImageController
{
    public function show($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.images.show', [
            'project' => $project
        ]);
    }

    public function create(int $no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.images.create', [
            'project' => $project
        ]);
    }

    public function add(int $no, ImageAddRequest $request)
    {
        $params = $request->uploadImage();

        $project = Project::with('tasks')
            ->where('no', $no)
            ->first();

        if ($params) {
            $project->images()
                ->create($params);
        }

        return to_route('projects.images.show', [
            'no' => $project->no
        ]);
    }

    public function destroy($no, $imageId)
    {
        ProjectImage::destroy($imageId);

        return to_route('projects.images.show', [
            'no' => $no
        ]);
    }
}

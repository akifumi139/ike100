<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProjectImageController extends Controller
{
    public function __construct()
    {

    }

    public function show($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.images.show', ['project' => $project]);
    }

    public function create($no)
    {
        $project = Project::with('tasks')->where('no', $no)->first();

        return view('projects.images.create', ['project' => $project]);
    }

    public function add($no, Request $request)
    {
        $params['name'] = $this->uploadImage('image', $request);

        $project = Project::with('tasks')->where('no', $no)->first();
        $project->images()->create($params);

        return to_route('projects.images.show', ['no' => $project->no]);

    }

    public function destroy($no, $imageId)
    {
        ProjectImage::destroy($imageId);

        return to_route('projects.images.show', ['no' => $no]);

    }

    private function uploadImage($path, $request)
    {
        $imagePath = $request->file($path)->store('tmp');

        $image = Image::read(storage_path("app/$imagePath"));
        $webpEncoded = $image->toWebp(80);

        $webpPath = 'public/projects/' . pathinfo($imagePath, PATHINFO_FILENAME) . '.webp';
        Storage::put($webpPath, $webpEncoded);

        return 'storage/projects/' . basename($webpPath);
    }
}

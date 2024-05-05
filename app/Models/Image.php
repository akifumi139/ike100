<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Image
{
    public static function upload(Request $request, String $name, String $path = 'articles')
    {
        if (is_null($request->file($name))) {
            return null;
        }

        $imagePath = $request->file($name)->store('tmp');

        $manager = new ImageManager(new Driver());
        $image = $manager->read(storage_path("app/$imagePath"));
        $webpEncoded = $image->toWebp(80);

        $savePath = $path . '/' . pathinfo($imagePath, PATHINFO_FILENAME);

        Storage::put("public/$savePath.webp", $webpEncoded);
        Storage::delete($imagePath);

        return "storage/$savePath.webp";
    }

    public static function drop($path)
    {
    }
}

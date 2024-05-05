<?php

namespace App\Http\Requests\Project;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageAddRequest extends FormRequest
{
    public function uploadImage()
    {
        $params = [];

        $imagePath = Image::upload($this, 'image', 'projects');

        if ($imagePath) {
            $params['name'] = $imagePath;
        }

        return $params;
    }
}

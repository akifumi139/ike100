<?php

namespace App\Http\Requests\Editor;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'header_image' => ['nullable'],
            'content' => ['required']
        ];
    }

    public function params()
    {
        $params = [
            'title' => $this->title,
            'content' => $this->input('content'),
            'status' => '公開',
        ];

        $headerImage = Image::upload($this, 'header_image',);
        if ($headerImage) {
            $params['header_image'] = $headerImage;
        }

        return $params;
    }
}

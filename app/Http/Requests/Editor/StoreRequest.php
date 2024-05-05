<?php

namespace App\Http\Requests\Editor;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'title' => $this->title,
            'header_image' => Image::upload($this, 'header_image',),
            'content' => $this->input('content'),
            'status' => $this->status,
            'project_id' => $this->project_id
        ];
    }
}

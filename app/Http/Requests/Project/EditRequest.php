<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function params(): array
    {
      return  [
            'title' => $this->title,
            'body' => $this->body,
            'level' => $this->level != '' ? $this->level : null,
            'hurdle' => $this->hurdle,
            'review' => $this->review,
        ];
    }
}

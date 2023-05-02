<?php

namespace App\Http\Requests\Admin\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class LessonUpdateRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:255',
//            'description' => 'required|min:3',
            'video_1' => 'required',
        ];
        return $rules;
    }
}

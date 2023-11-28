<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'course_cat_id' => ['required', 'exists:course_cats,id'],
            'name'          => ['required', 'string', 'min:1', 'max:255'],
            'skill_level'   => ['required', 'string', 'min:1', 'max:80'],
            'language'      => ['required', 'string', 'min:1', 'max:80'],
            'image'         => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'video_des'     => ['nullable', 'string', 'min:1'],
            'description'   => ['required', 'string', 'min:1'],
            'status'        => ['required', 'boolean']
        ];
    }
}

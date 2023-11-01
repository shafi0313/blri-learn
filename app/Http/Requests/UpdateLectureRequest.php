<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id'  => ['required', 'exists:courses,id'],
            'chapter_id' => ['required', 'exists:chapters,id'],
            'type'       => ['required', 'boolean'],
            'name'       => ['required', 'string', 'min:1', 'max:255'],
            'text'       => ['required'],
            'time'       => ['required_if:type,==,2']
        ];
    }
}

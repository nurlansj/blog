<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле необходимо заполнить',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'Id категории должен соответствовать числовому типу',
            'category_id.exists' => 'Id категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
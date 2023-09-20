<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequets extends FormRequest
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
            'name' => 'required|unique:categories,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mời bạn nhập tên danh mục',
            'name.unique' => "$this->name đã tồn tại",
        ];
    }
}

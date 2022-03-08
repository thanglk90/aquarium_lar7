<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    private $table = 'category';
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
     * @return array
     */
    public function rules()
    {
        $id = '';
        if($this->id){
            $id = $this->id;
        }

        return [
            'name'      => "required|unique:$this->table,name,$id",
            'slug'      => "required|unique:$this->table,slug,$id",
            'parent_id' => "required|numeric",
            'seo_desc'  => "",
            'status'    => "required|in:active,inactive",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin nhập tên danh mục',
            'slug.required' => 'Xin nhập tên danh mục',
            'parent_id.required' => 'Xin nhập tên danh mục',
            'status.required' => 'Xin nhập tên danh mục',

            'name.unique' => 'Tên danh mục đã tồn tại',
            'slug.unique' => 'Slug danh mục đã tồn tại',
            'status.in' => 'Xin chọn trạng thái ẩn/hiện',
        ];
    }
}

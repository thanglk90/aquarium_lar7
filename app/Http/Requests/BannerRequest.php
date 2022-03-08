<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    private $table = 'banner';
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
            'thumb'      => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin nhập tên hạng mục tùy chọn',
            'thumb.required' => 'Xin nhập giá trị của hạng mục tùy chọn',
        ];
    }
}

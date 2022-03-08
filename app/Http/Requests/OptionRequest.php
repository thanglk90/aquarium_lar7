<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    private $table = 'options';
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
            'value'      => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin nhập tên hạng mục tùy chọn',
            'value.required' => 'Xin nhập giá trị của hạng mục tùy chọn',
        ];
    }
}

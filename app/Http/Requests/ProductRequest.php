<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private $table = 'product';
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
            'name'          => "bail|required|unique:$this->table,name,$id",
            'slug'          => "bail|required|unique:$this->table,slug,$id",
            'sku'          => "bail|required|unique:$this->table,sku,$id",
            'introduce'     => "",
            'description'   => "",
            'category_id'   => "required|numeric",
            'price'         => "required|numeric|min:1",
            'sale_price'    => "required|numeric|min:0",
            'store'         => "required|numeric|min:0",
            'guarantee'     => "required|numeric|min:0",
            'status'        => "required|in:active,inactive",
            // 'thumb'         => 'bail|mimes:jpg,icon,png|between:10,500|dimensions:min_width=10,min_height=10,max_width=1600,max_height=1600',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin nhập tên sản phẩm',
            'slug.required' => 'Xin nhập tên sản phẩm',
            'sku.required' => 'Xin nhập mã định danh sản phẩm (SKU)',
            'category_id.required' => 'Xin chọn danh mục',
            'status.required' => 'Xin nhập tên sản phẩm',
            'store.required' => 'Xin nhập lượng hàng tồn kho',
            'guarantee.required' => 'Xin nhập số tháng bảo hành',
            // 'introduce.required' => 'Xin nhập giới thiệu sản phẩm',
            // 'description.required' => 'Xin nhập mô tả chi tiết sản phẩm',
            'price.required' => 'Xin nhập giá bán sản phẩm',
            'sale_price.required' => 'Xin nhập giá bán khuyến mãi',

            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'slug.unique' => 'Slug sản phẩm đã tồn tại',
            'status.in' => 'Xin chọn trạng thái ẩn/hiện',
            'category_id.numeric' => 'Xin chọn danh mục',

            // 'thumb.dimensions' => 'Hình ảnh tối thiểu :min_widthxmin_height, tối đa :max_widthxmax_height',
            // 'thumb.mimes' => 'Chỉ tải ảnh định dạng :mimes',
            // 'thumb.between' => 'Dung lượng ảnh từ :min - :max KB',
        ];
    }
}

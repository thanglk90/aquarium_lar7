<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AdminModel;
use App\Models\CategoryModel;

class ProductModel extends AdminModel
{
    // use HasFactory;

    protected   $table          = 'product';
    protected   $primaryKey     = 'id';
    protected   $fillable       = [
        'name', 
        'slug', 
        'sku',
        'introduce',
        'description',
        'category_id',
        'price',
        'sale_price',
        'store',
        'guarantee',
        'thumb',
        'status'
    ];
    public      $timestamps     = false;
 
    protected $notAcceptCrud = [
        '_token',
        'id',
        '_method'
    ];

    public function getList($params, $option){

        if($option['task'] == 'admin-get-list'){
            
            $query = self::select('*');
    
            if(isset($params['search']) && $params['search'] != ''){
                $query = $query->where('name', 'LIKE', '%' . $params['search'] . '%');
            }
    
            if($query){
                return $query->paginate($params['pagination']['itemPerPage'])->withQueryString();
            }
        }



        if($option['task'] == 'admin-get-list-by-parent-category'){
            
            $cateParents = CategoryModel::all()->toArray();
            $data        = [];

            foreach ($cateParents as $cateParent) {
                $cateSubs = CategoryModel::where('parent_id', $cateParent['id'])->get()->keyBy('id')->toArray();

                if(count($cateSubs) > 0) {
                    $data[$cateParent['id']]['cateSubs'] = $cateSubs;
                    $data[$cateParent['id']]['category_name'] = $cateParent['name'];
                }

                if(isset($data[$cateParent['id']]['cateSubs'])){
                    foreach ($data[$cateParent['id']]['cateSubs'] as $key => $cateSub) {
                        $products = self::where('category_id', $cateSub['id']);
                        if(isset($params['search']) && $params['search'] != ''){
                            $products = $products->where('name', 'LIKE', '%' . $params['search']. '%');
                        }
                        $products = $products->get()->keyBy('id')->toArray();
                        if(count($products) > 0){
                            foreach ($products as $product_id => $product) {
                                $data[$cateParent['id']]['products'][$product_id] = $product;
                            }
                        }
                    }
                }
            }
            
            foreach ($data as $k1 => $cate_product) {
                if(!isset($cate_product['products'])){
                    unset($data[$k1]);
                }
            }
            
            return $data;
        }

        if($option['task'] == 'client-get-list-by-parent-category'){
            
            $data       = [];
            $cateSubs   = CategoryModel::where('parent_id', $params['cate_parent_id'])->get()->keyBy('id')->toArray();
            $cateSubsId = array_column($cateSubs, 'id');
            $products   = '';
            if(count($cateSubs) > 0) {
                foreach ($cateSubs as $key => $cateSub) {
                    $products = self::whereIn('category_id', $cateSubsId)->paginate($params['pagination']['itemPerPage']);
                }
               
            }

            return $products;
        }

        if($option['task'] == 'client-get-list-by-sub-category'){
            
            $products = self::where('category_id', $params['cate_sub_id'])->paginate($params['pagination']['itemPerPage']);

            return $products;
        }

        if($option['task'] == 'client-get-list-for-homepage'){
            
            $products = self::where('category_id', $params['cate_sub_id'])
                            ->orderByDesc('store')
                            ->select('name', 'slug', 'id', 'thumb', 'price', 'sale_price', 'store')->take($params['pagination']['itemPerPage'])->get();

            return $products;
        }

        if($option['task'] == 'client-get-item-related'){
            $data = self::where('category_id', $params)->take(12)->get();
            return $data;
        }

        if($option['task'] == 'client-get-list-by-keyword'){
            
            $query = self::select('*');
    
            if(isset($params['search']) && $params['search'] != ''){
                $query = $query->where('name', 'LIKE', '%' . $params['search'] . '%');
            }
    
            if($query){
                return $query->paginate($params['pagination']['itemPerPage'])->withQueryString();
            }
        }

        if($option['task'] == 'client-get-list-by-cate-slug'){

            $categoryModel = new CategoryModel();
            $cate_sub = $categoryModel::where('slug', $params)->first();
            $product_list = self::where('category_id', $cate_sub->id)->get();

            return $product_list;

        }
        
    }

    public function store($params, $option){

        if($option['task'] == 'store'){

            $data = $this->prepareParams($params);
            if (filter_var($data['thumb'], FILTER_VALIDATE_URL)) {
                $data['thumb'] = basename($data['thumb']);
            }
            $data['created_at'] = date('d-m-Y H:i:s');
            $data['updated_at'] = date('d-m-Y H:i:s');
            return self::create($data);

        }
    }

    public function getItem($param, $option){

        if($option['task'] == 'admin-get-item'){

            return self::find($param);

        }

        if($option['task'] == 'client-get-item-by-slug'){

            return self::where('slug', $param)->first();

        }
    }

    public function saveItem($params, $option){

        if($option['task'] == 'update'){

            $data = $this->prepareParams($params);

            if (filter_var($data['thumb'], FILTER_VALIDATE_URL)) {
                $data['thumb'] = basename($data['thumb']);
            }

            $data['updated_at'] = date('d-m-Y H:i:s');

            self::where('id', $params['id'])->update($data);

        }

        if($option['task'] == 'update-status-ajax'){

            $data = $this->prepareParams($params);

            $data['updated_at'] = date('d-m-Y H:i:s');

            self::where('id', $params['id'])->update($data);

             

        }
    }

    public function deleteItem($id){

        return self::where('id', $id)->delete();
    }
}

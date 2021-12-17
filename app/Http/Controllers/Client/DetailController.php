<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class DetailController extends Controller
{

    private $viewPath                   = 'client.pages.detail';
    private $controllerName             = 'detail';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 12;
    }

    public function index($slug){
        $item               = $this->productModel->getItem($slug, ['task' => 'client-get-item-by-slug']);
        $cate_sub           = $this->categoryModel->getItem($item->category_id, ['task' => 'admin-get-item']);
        $cate_parent        = $this->categoryModel->getItem($cate_sub->parent_id, ['task' => 'admin-get-item']);
        $related_products   = $this->productModel->getList($item->category_id, ['task' => 'client-get-item-related']);
     
        return view($this->viewPath . '.index', [
            'item'          => $item,
            'cate_sub'      => $cate_sub,
            'cate_parent'   => $cate_parent,
            'related_products' => $related_products
        ]);
        
    }
}


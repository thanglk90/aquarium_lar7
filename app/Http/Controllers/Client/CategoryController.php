<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends Controller
{

    private $viewPath                   = 'client.pages.category';
    private $controllerName             = 'category';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 50;
    }

    public function showProductParent($slug){

        $cate_parent  = $this->categoryModel->getItem($slug, ['task' => 'client-get-item-by-slug']);
        $this->params['cate_parent_id'] = $cate_parent->id;
        $items = $this->productModel->getList($this->params, ['task' => 'client-get-list-by-parent-category']);

        return view($this->viewPath . '.productParent', [
            'items'      => $items,
            'cate_parent'     => $cate_parent
        ]);
        
    }

    public function showProductSubParent($slug){

        $cate_sub  = $this->categoryModel->getItem($slug, ['task' => 'client-get-item-by-slug']);
        $cate_parent = $this->categoryModel->getItem($cate_sub->parent_id, ['task' => 'admin-get-item']);
        $this->params['cate_sub_id'] = $cate_sub->id;
        $items = $this->productModel->getList($this->params, ['task' => 'client-get-list-by-sub-category']);

        return view($this->viewPath . '.productSubParent', [
            'items'      => $items,
            'cate_sub'     => $cate_sub,
            'cate_parent' => $cate_parent
        ]);
        
    }
}


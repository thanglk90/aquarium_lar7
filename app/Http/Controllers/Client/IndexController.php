<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class IndexController extends Controller
{

    private $viewPath                   = 'client.pages.index';
    private $controllerName             = 'index';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 10;
    }

    public function index(){

        $cate_sub_list = $this->categoryModel->getList(null, ['task' => 'client-get-list-sub']);
        $items = [];
        foreach ($cate_sub_list as $key => $cate_sub) {

            $this->params['cate_sub_id'] = $cate_sub->id;
            $items[$cate_sub->id]['products'] = $this->productModel->getList($this->params, ['task' => 'client-get-list-for-homepage'])->toArray();
            $items[$cate_sub->id]['cate_sub'] = $cate_sub->toArray();
        }

        return view($this->viewPath . '.index', [
            'items'      => $items,
        ]);
        
    }
}


<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class SearchController extends Controller
{

    private $viewPath                   = 'client.pages.search';
    private $controllerName             = 'search';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 50;
    }

    public function index($search){
        $this->params['search'] = $search;
        $items = $this->productModel->getList($this->params, ['task' => 'client-get-list-by-keyword']);

        return view($this->viewPath . '.index', [
            'items'      => $items,
            'search'     => $search
        ]);
        
    }
}


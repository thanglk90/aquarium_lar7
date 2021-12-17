<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class QuoteController extends Controller
{

    private $viewPath                   = 'client.pages.quote';
    private $controllerName             = 'quote';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 12;
    }

    public function index(Request $request){
        $this->params['search'] = $request->search;
        $items = $this->productModel->getList($this->params, ['task' => 'admin-get-list-by-parent-category']);

        return view($this->viewPath . '.index', [
            'items' => $items
        ]);
        
    }
}



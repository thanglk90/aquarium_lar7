<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ContactController extends Controller
{

    private $viewPath                   = 'client.pages.contact';
    private $controllerName             = 'contact';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->params['pagination']['itemPerPage']  = 12;
    }

    public function index(){

        return view($this->viewPath . '.index');
        
    }
}


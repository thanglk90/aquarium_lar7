<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests\CategoryRequest AS MainRequest;
use App\Models\CategoryModel AS MainModel;
use App\Models\ProductModel;

class CategoryController extends Controller
{

    private $viewPath                   = 'admin.category';
    private $controllerName             = 'category';
    private $params                     = [];

    public function __construct(){
        View::share('controllerName', $this->controllerName);
        $this->model = new MainModel();
        $this->params['pagination']['itemPerPage']  = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->params['search'] = $request->search;
        $items = $this->model->getList($this->params, ['task' => 'admin-get-list']);

        return view($this->viewPath . '.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->model->getList($this->params, ['task' => 'admin-get-list']);
        return view($this->viewPath . '.create', [
            'categoryList' => $categoryList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainRequest $request)
    {

        $data = $request->all();

        $model  = $this->model->store($data, ['task' => 'store']);
        
        return redirect()->route($this->controllerName . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categoryList = $this->model->getList($this->params, ['task' => 'admin-get-list']);
        $item         = $this->model->getItem($id, ['task' => 'admin-get-item']);
        return view($this->viewPath . '.edit', [
            'categoryList' => $categoryList,
            'item'         => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainRequest $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;

        $model  = $this->model->saveItem($data, ['task' => 'update']);
        
        return redirect()->route($this->controllerName . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->deleteItem($id);
        $notify = 'Xóa thành công!';

        return redirect()->route($this->controllerName . '.index')->with('notify', $notify);
    }

    public function changeStatusAjax($id, $currentStatus){
        
        $data['id']            = $id;
        $data['status']        = $currentStatus == 'active' ? 'inactive' : 'active';
        
        $this->model->saveItem($data, ['task' => 'update-status-ajax']);

        $statusTmp = config('myConfig.template.status');
        
        $result['text']     = $statusTmp[$data['status']]['name'];
        $result['status']   = $data['status'];
        echo json_encode($result);
    }

    public function getCateChildAjax($slug){
        $cate_sub_list = $this->model->getList($slug, ['task' => 'client-get-list-sub-by-parent-slug']);
        $xhtml = '';
        if(count($cate_sub_list) > 0){
            foreach ($cate_sub_list as $key => $cate_sub) {
                $xhtml .= sprintf('<option value="%s">%s</option>', $cate_sub->slug, $cate_sub->name);
            }
        }

        echo $xhtml;
    }

    public function showProducts(){
        $productModel= new ProductModel();
        $data = $productModel->getList(null, ['task' => 'admin-get-list-by-parent-category']);

        
    }
}

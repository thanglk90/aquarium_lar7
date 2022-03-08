<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminModel;

class BannerModel extends AdminModel
{
    protected   $table          = 'banner';
    protected   $primaryKey     = 'id';
    
    protected   $fillable       = [
        'name', 
        'thumb',
        'note'
    ];
 
    protected $notAcceptCrud = [
        '_token',
        'id',
        '_method'
    ];

    public function getList($params, $option){

        if($option['task'] == 'admin-get-list'){
            
            $query = self::select('*')->orderBy('name', 'asc');
    
            if(isset($params['search']) && $params['search'] != ''){
                $query = $query->where('name', 'LIKE', '%' . $params['search'] . '%');
            }
    
            if($query){
                return $query->paginate($params['pagination']['itemPerPage'])->withQueryString();
            }

        }

        if($option['task'] == 'admin-get-list-pluck'){
            return self::all()->pluck('name', 'id');
        }

        if($option['task'] == 'client-get-list-sub-by-parent-slug'){

            $parent = self::where('slug', $params)->first();
            $cate_sub_list = self::where('parent_id', $parent->id)->get();

            return $cate_sub_list;

        }

        if($option['task'] == 'client-get-list-sub'){

            $cate_sub_list = self::where('parent_id', '<>', 0)->get();

            return $cate_sub_list;

        }

        
    }

    public function store($params, $option){

        if($option['task'] == 'store'){

            $data = $this->prepareParams($params);
            if (filter_var($data['thumb'], FILTER_VALIDATE_URL)) {
                $data['thumb'] = basename($data['thumb']);
            }
            // $data['created_at'] = date('d-m-Y H:i:s');
            // $data['updated_at'] = date('d-m-Y H:i:s');
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

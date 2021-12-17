<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    // use HasFactory;

    protected $notAcceptCrud = [
        '_token',
        'id',
        '_method'
    ];

    public function prepareParams($arrRequest){
        return $data = array_diff_key($arrRequest, array_flip($this->notAcceptCrud));
    }
}

<?php

namespace App\Http\Helper;

use App\Models\OptionModel;

class Option {

    public static function getOption(){

        return OptionModel::select('id', 'name', 'value')->get()->pluck('value', 'name')->toArray();
    }
}
<?php

namespace App\Http\Helper;

use App\Models\OptionModel;

class Meta {

    #Tiêu đề tùy chỉnh, áp dụng cho từng trang khi seo_all_page == no
    public static function showTitle($title, $options, $productOrCategory = []){
   
        if(count($productOrCategory) > 0){
            $options = array_merge($options, $productOrCategory);
        }

        if($title == null){
            $title = $options['meta_desc_all_page'];
        }

        foreach ($options as $key => $value) {

            $title = str_replace(":" . $key, $value, $title);
        }

        return $title;
    }

    public static function showDesc($seo_desc, $options, $productOrCategory = []){

        if(count($productOrCategory) > 0){
            $options = array_merge($options, $productOrCategory);
        }

        if($seo_desc == null){
            $seo_desc = $options['meta_desc_home_page'];
        }

        foreach ($options as $key => $value) {

            $seo_desc = str_replace(":" . $key, $value, $seo_desc);
        }

        return $seo_desc;
    }
}
<?php

namespace App\Http\Helper;

class Url {

    public static function linkThumb($thumb){

        $thumb = route('client-home') . '/storage/photos/shares/products/' . $thumb;
        // $thumb = route('client-home') . '/storage/photos/shares/products/' . $thumb; -> if public to host
        return $thumb;
    }
}
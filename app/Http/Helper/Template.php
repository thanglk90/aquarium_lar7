<?php

namespace App\Http\Helper;

use App\Http\Helper\Url;

class Template {

    public static function showStatus($currentUrl, $status, $id){
        $statusTmp  = config('myConfig.template.status');
        $currentTmp = array_key_exists($status, $statusTmp) ? $statusTmp[$status] : 'default';
        $text       = $currentTmp['name'];
        $checked    = $status == 'active' ? 'checked' : '';
        $url        = $currentUrl;

        return sprintf('<div class="form-check form-switch">
                            <input class="form-check-input status-change" data-url="%s" data-id="%s" data-status="%s" name="status" type="checkbox" id="flexSwitchCheckDefault" %s>
                            <label class="form-check-label status-label" for="flexSwitchCheckDefault">%s</label>
                        </div>', $url, $id, $status, $checked, $text);
        

    }

    public static function showThumb($thumb){
        if(!$thumb){
            return 'Chưa có ảnh đại diện';
        }
        $thumb = Url::linkThumb($thumb);
        return sprintf('<img src="%s" style="width: auto; height: 100px;" />', $thumb);
    }
}
<?php

namespace App\Helpers;

class APIHelpers {

    public static function createAPIResponse($is_error, $code, $message, $content){

        $result = [];

        if($is_error){
            $result['success'] = false;
            $result['success'] = $code;
            $result['success'] = $message;
        }else{
            $result['success'] = true;
            $result['success'] = $code;
            if($content == null){
                $result['message'] = $message;
            }else{
                $result['data'] = $content;
            }
        }

        return $result;
    }
}

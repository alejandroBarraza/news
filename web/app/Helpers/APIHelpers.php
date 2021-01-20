<?php

namespace App\Helpers;

class APIHelpers {

    /**
     * Creates an API response from the data.
     *
     * @param $is_error
     * @param $code
     * @param $message
     * @param $content
     * @return array
     */
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

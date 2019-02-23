<?php


class api {
    
    function get_api_data($url){
        $data_json = file_get_contents($url);
        $get_data = json_decode($data_json , true);
        return $get_data ; 
    }
     
}

?>
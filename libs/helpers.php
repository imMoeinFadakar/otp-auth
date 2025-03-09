<?php 

namespace Libs;


class Helpers{


    public function assets(string $path){

        return  $this->site_url('/assets/'.$path);
    
    }
    
    public function site_url(string $url = ''){
    
        return BASE_URL . $url;
    
    }
    
    
    public function logicFiles($loginFileName){
    
    
        return BASE_PATH . '/logic/' . $loginFileName;
    
    }


}



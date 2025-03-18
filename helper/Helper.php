<?php 


namespace Helper;

class Helpers{

    public function redirct(string $path)
    {
            return header("location : " . __DIR__. "/../". $path);


    }



}
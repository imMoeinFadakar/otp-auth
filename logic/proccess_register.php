<?php 

namespace Logic;

use Libs\Helpers;



// validation data

if(isset($_POST) and !empty($_POST)) {

    if($_POST['name'] and $_POST['phone'] and $_POST['email'] ){

        



    }else{
        $error = "please fillout all fileds!";
        require "./../tpl/register-tpl.php";
    }



}



<?php 

 require "bootstrap/init.php";




if(isset($_GET['action']) and $_GET['action'] === "register"){

    include "tpl/register-tpl.php";


}else{

    include "tpl/login-tpl.php";

}







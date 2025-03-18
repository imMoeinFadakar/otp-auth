<?php 
session_start();



$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

include "Controller/RegisterController.php";
include "Controller/LoginController.php";

$Register = new Controller\RegisterController();
$login = new Controller\LoginController();
    if($method === "GET"){

        switch ($request){
            case "/register":
            $Register->returnView();
            break;
            case "/login":
            $login->returnViewLogin();
             break;
             case"/logout":
                $login->logout();    
            break;
            default:
           echo  "404: page not find";
            break;
            


        }



    }else if($method === "POST"){

        switch ($request){
            case "/post-register":
                $Register->store($_POST);
            break;
            case "/post-login":
                $login->checkForUser($_POST); // is user loggined before
            break;
            case "/post-verify":
                $login->isUserTokenCorrect($_POST)   ;             

            break;
          

        }   


    }





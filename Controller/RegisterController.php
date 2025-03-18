<?php 

namespace Controller;

include "Request/Register/RegisterRequest.php";
include "Model/Register.php";

require('vendor/autoload.php');

use Request\Register\RegisterRequest;
use Model\Register;

class RegisterController   {

    protected $registerValidation;
    protected $registerModel;
    public function __construct()
    {
        $this->registerValidation = new RegisterRequest();
        $this->registerModel = new Register();
    }
    public function returnView()
    {
        require("view/register-tpl.php");
    }

    public function store($request)
    {
       $validation =  $this->registerValidation->validation($request); // validation request



            if($validation === true){
                 $this->registerModel->AddNewUser($request);
                 $message = "User srtored succesfully!";
                return require "View/register-tpl.php";

            }else{
                $message = "this user is already exists!";
                return require "View/register-tpl.php";
            }
        
    }


}



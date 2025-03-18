<?php 

namespace Request\Login;

use Model\Login;
use Rakit\Validation\Validator;
require('vendor/autoload.php');


$validator  = new   Validator();
class LoginRequest{

    protected $validator;
    protected $loginModel;
    /**
     * Class constructor.
     */

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->validator = new Validator();
         $this->loginModel = new Login();
    }

    public function validation($request)
    {
        $validation = $this->validator->make($request, [

            'phone'   => 'required|numeric'
        ]);

        $validation->validate();

        $this->failedValidation($validation,"login");

       return true;


    }
    public function isUserLoggedInBefore($request)
    {
        return $this->loginModel->isUserLoggedInBefore($request);
    }
   

  

    public function failedValidation($validation , $view_page_name)
    {
      

       if($validation->fails() and $view_page_name === "login"){

        $errors = $validation->errors();
         require "View/login-tpl.php";

       }else if($validation->fails() and $view_page_name === "verify"){

        $errors = $validation->errors();
        require "View/verify-tpl.php";

       }else{

        return true;

       }


    }


    public function tokenValidation($request)
    {
        $validation = $this->validator->make($request,[
            "token" => 'required'

        ]);
        $validation->validate();

        $this->failedValidation($validation,"verify");
    }

}



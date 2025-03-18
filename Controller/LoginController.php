<?php 



namespace Controller;
// session_start();


include "Request/Login/LoginRequest.php";
require "Model/Login.php";

require('vendor/autoload.php');
include "./helper/Helper.php";
include "mail.php";


use Model\Login;

use Helper\Helpers;
use Request\Login\LoginRequest;



class LoginController {

    protected $LoginRequest;
    protected $LoginModel;
    protected $helper;
    public function __construct()
    {
        $this->LoginRequest = new LoginRequest();
        $this->LoginModel = new Login();
        $this->helper = new Helpers();
    }
   
 
    public function returnViewLogin($message = '') {
        $userIsNotExistsError = $message;
         require("view/login-tpl.php");
       
    }   
    public function verifyVeiw($message = '') {
        $user_token_isnt_exists_message = $message;
        require("view/verify-tpl.php");
      
   }  
   public function indexView($message = '')
   {
     $wellcome_message =  $message;
     require("view/index-tpl.php");
   }
   public function generateToken(int $byte)
{
    return  bin2hex(random_bytes($byte));
    
}
    public function checkForUser($request)
    {
        $this->LoginRequest->validation($request);
        $user =  $this->LoginRequest->isUserLoggedInBefore($request);
        $this->isUserEmpty($user);
        $token = $this->generateToken(10);
        $this->addTokenInLoginUser($user['id'], $token);
        $this->createTokenMail($user['email'],$token);
        return $this->verifyVeiw();
    }
    public function addTokenInLoginUser($user, $token)
    {
        return $this->LoginModel->addTokenInLoginUser($user, $token); // store new login_user in model
    }

    public function createTokenMail(string $email , string|int $token): bool
    {
        global $phpmailer;
        $phpmailer->setFrom('from@example.com', 'Mailer');  
        $phpmailer->addAddress($email , 'Moein Fadakar'); 
        $phpmailer->isHTML(true);  
        $phpmailer->Subject = 'moein auth';  
        $phpmailer->Body    = "token :". $token;   
        return $phpmailer->send();  
    }

    public function isUserEmpty($user)
    {
        if($user){
              return true;  
        }else{
            $userIsNotExistsError = "User is Not Exists!";
            require("view/login-tpl.php");
        }
    }


    /// validation user token


    public function isUserTokenCorrect($request)
    {
        $this->LoginRequest->tokenValidation($request);
        $User =  $this->LoginModel->isTokenExists($request); // is that somthing exsts with this verify token
        $_SESSION['token_id'] = $User['id'];
        $_SESSION['login_status'] =  $this->isUserTokenExists($User);
        $this->isUserLogin($_SESSION['login_status']);
        
    }
    public function isUserTokenExists($UserToken): bool
    {
    
        if($UserToken)
            return true;
        

        return false;

    }
   
    /// enter to index page


    public function isUserLogin($session)
    {   
        if($session)
            return $this->indexView("wellcome! sign in was successful");

        return $this->verifyVeiw("token us not Valied!");
    }

    public function logout()
    {
        
        $DeletedUserToken = $this->LoginModel->deleteUserToken($_SESSION['user_id']);
        if($DeletedUserToken)
            $_SESSION['login_status'] =  false;
            return $this->returnViewLogin("logout was successfull");


    }
}






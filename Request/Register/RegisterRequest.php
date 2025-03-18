<?php 

namespace Request\Register;
require('vendor/autoload.php');

use Rakit\Validation\Validator;
use Model\Register;


class RegisterRequest{

    
    protected $validator;
    protected $RegisterDb ;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->validator = new Validator();
        $this->RegisterDb = new Register();
    }

    public function validation(array $request): bool
    {   
        
        $validation = $this->validator->make($request, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'phone'   => 'required|numeric'
        ]);

        $validation->validate();

         $this->failedValidation($validation);
       $userExistance = $this->isUserExists($request);
        $permission  = $this->iSAllowedToStore($userExistance);

         return $permission;
    }

    public function failedValidation($validation): bool
    {
      

       if($validation->fails()){

        $errors = $validation->errors();
       return  require "View/register-tpl.php";

       }else{

        return true;

       }


    }
    public function isUserExists($request): int
    {
       return  $this->RegisterDb->isUserExists($request);

    }
    public function iSAllowedToStore($userExistance): bool
    {
        if($userExistance){

            return false;

        }

        return true;

    }

}
<?php 

namespace Model;

use Carbon\Carbon;
use PDO;

class Login {

    protected $PDO;
    
    public function __construct()
    {
        $this->PDO = new PDO("mysql:host=127.0.0.1;dbname=otp","root","");
    }

    public function isUserLoggedInBefore(array $request)
    {
        $sql = "SELECT * FROM users WHERE phone = :phone";
       $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":phone", $request["phone"]);
        $stmt->execute();
        return $stmt->fetch();

    }
    public function addTokenInLoginUser(int $user_id, string $token)
    {   
        $sql = "INSERT INTO login_user(user_id,token,expire_at,created_at) VALUES(:user_id,:token,:expire_at,:created_at)";
        $expire_at = Carbon::now()->addMinutes(10); // make expiration time for token
        $created_at = Carbon::now();
       $stmt =  $this->PDO->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":expire_at",$expire_at);
        $stmt->bindParam(":created_at",$created_at);
        $stmt->execute();
        
      return $stmt->fetch();  
    }

    public function isTokenExists($request)
    {
        $sql = "SELECT * FROM login_user WHERE token = :token";
        $stmt = $this->PDO->prepare($sql);
         $stmt->bindParam(":token", $request["token"]);
         $stmt->execute();
         return $stmt->fetch(); 
    }
    public function deleteUserToken(int $TokenId)
    {
        $sql = "DELETE FROM login_user WHERE id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":id", $TokenId);
        $stmt->execute();
        return $stmt->rowCount(); 
    }


}


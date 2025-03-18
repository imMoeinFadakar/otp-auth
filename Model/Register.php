<?php 

namespace Model;

use PDO;

class Register {

    protected $PDO;
    
    public function __construct()
    {
        $this->PDO = new PDO("mysql:host=127.0.0.1;dbname=otp","root","");
    }

    public function AddNewUser($request)
    {
        $sql = "INSERT INTO users(fullname,email,phone) VALUES(:name,:email,:phone)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":email", $request["email"]);
        $stmt->bindParam(":name", $request["name"]);
        $stmt->bindParam(":phone", $request["phone"]);
        $stmt->execute();

        return $stmt->rowCount();
    }
    public function isUserExists(array $request)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE fullname = :name AND phone = :phone AND email = :email";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":name", $request["name"]);
        $stmt->bindParam(":phone", $request["phone"]);
        $stmt->bindParam(":email", $request["email"]);
        $stmt->execute();

        return $stmt->fetchColumn();

    }
}

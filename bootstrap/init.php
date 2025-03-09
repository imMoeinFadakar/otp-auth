<?php 

require "constants.php";
require "config.php";
require BASE_PATH ."libs/helpers.php";

try{

    $pdo = new PDO("mysql:host={$dbconfig->host};
    dbname={$dbconfig->dbname};
    charset={$dbconfig->charset}",
    $dbconfig->user,
    $dbconfig->password);

}catch(Exception $e){

    echo $e->getMessage();

}





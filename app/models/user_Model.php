<?php

class UserModel {

    private $userDb;

    public function __construct (){
        $this->userDb = new PDO('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getUser($email) {
        $query = $this->userDb->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
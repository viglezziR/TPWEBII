<?php
require_once './app/views/auth_View.php';
require_once './app/models/user_Model.php';

class AuthController {
    private $view;
    private $model;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showFormLogin() {
        $this->view->showFormLogin();
    }

    public function validateUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUser($email);

        if ($user && password_verify($password, $user->password)) {

            session_start();
            $_SESSION['USER_ID'] = $user->user_id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL);
        } 
        else {
           $this->view->showFormLogin("El usuario o la contraseña no existe.");
        } 

    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
    
}
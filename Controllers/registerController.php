<?php
require '../Models/userModel.php';

class registerController
{
    private $model;
    public $errorMessage = '';

    public function __construct() {
        $this->model = new UserModel('localhost', 'inf2pj_06', 'root', '');
    }

    public function registerRequest()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['registerUser'])) {
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;
                $password_verify = $_POST['password_verify'] ?? null;
                $tp = $_POST['tp'] ?? null;

                if ($this->verifyDoublePasswordUser($password, $password_verify) === false) {
                    $this->errorMessage = 'Les mots de passe ne correspondent pas';
                } else {
                    if ($this->verifyEMailRegisterUser($email)) {
                        $this->errorMessage = 'Cet email est déjà utilisé';
                    } else {
                        $this->model->addUser($email, $password, $tp);
                    }
                }
            }
        }
    }

    public function verifyEMailRegisterUser($email) {
        return $this->model->emailExists($email);
    }

    public function verifyDoublePasswordUser($password, $password2) {
        return $password === $password2;
    }
}
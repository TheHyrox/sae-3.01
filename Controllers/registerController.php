<?php

class registerController
{
    public function registerRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['registerUser'])) {
                if($this->verifyDoublePasswordUser($_POST['password'], $_POST['password_verify']) === false) {
                    echo 'Les mots de passe ne correspondent pas';
                } else{
                    if ($this->verifyEMailRegisterUser($_POST['email'])) {
                        echo 'Cet email est déjà utilisé';
                    } else {
                        $this->model->addUser($_POST['email'], $_POST['password'], $_POST['tp']);
                    }
                }
            }
        }
    }

    public function verifyEMailRegisterUser($email) {
        return $this->model->getUserByEmail($email);
    }

    public function verifyDoublePasswordUser ($password, $password2) {
        return $password === $password2;
    }
}
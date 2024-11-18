<?php
require '../Models/userModel.php';

class loginController
{
    private UserModel $model;
    public string $errorMessage = '';

    public function __construct()
    {
        $this->model = new UserModel('localhost', 'inf2pj_06', 'root', '');
    }

    public function loginRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['loginUser'])) {
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;

                if ($this->model->emailExists($email) && $this->model->passwordIsValid($password)) {
                    $_SESSION['email'] = $email;
                    header('Location: ./HTML/index.php');
                }
                else {
                    $this->errorMessage = 'E-mail ou mot de passe incorrect';
                }
            }
        }
    }
}

<?php
require '../Models/userModel.php';
require '../Utils/DBConfig/Database.php';
require '../Utils/DBConfig/Config.php';
if(!isset($_SESSION)){
    session_start();
}

class loginController
{
    private UserModel $model;
    public string $errorMessage = '';

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function loginRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['loginUser'])) {
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;

                if ($this->model->emailExists($email) && $this->model->passwordIsValid($email, $password)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['groupeTP'] = $this->model->getGrpTPUser($email);
                    $_SESSION['Id_User'] = $this->model->getUserIdByEmail($email);
                    if($this->model->isAdmin($email)) {
                        $_SESSION['isAdmin'] = true;
                    }
                    $this->errorMessage = 'Connection réussie';
                    header('Location: accueil');
                    exit(); // Ensure no further code is executed
                } else {
                    $this->errorMessage = 'E-mail ou mot de passe incorrect';
                }
            }
        }
    }
}
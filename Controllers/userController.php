<?php
require_once '/home/inf2pj06/public_html/Models/userModel.php';
require_once '/home/inf2pj06/public_html/Utils/DBConfig/Database.php';
require_once '/home/inf2pj06/public_html/Utils/DBConfig/Config.php';

class UserController {
    private UserModel $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function getUser($id){
        return $this->model->getUser($id);
    }

    public function getUserByEmail($email){
        return $this->model->getUserByEmail($email);
    }

    public function setNom(string $nom){
        return $this->model->setNom($nom);
    }
    public function setPrenom($prenom){
        return $this->model->setPrenom($prenom);
    }
    public function setMail($mail){
        return $this->model->setMail($mail);
    }
    public function setTP($tp){
        return $this->model->setTP($tp);
    }
    public function setMdp($mdp){
        return $this->model->setMdp($mdp);
    }
}
?>

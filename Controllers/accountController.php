<?php

require '../Models/accountModel.php';
require_once '/home/inf2pj06/public_html/Models/userModel.php';
require_once '/home/inf2pj06/public_html/Utils/DBConfig/Database.php';
require_once '/home/inf2pj06/public_html/Utils/DBConfig/Config.php';

use DBConfig\Database;

class accountController
{
    private accountModel $accountModel;
    private userModel $userModel;

    public function __construct()
    {
        $this->accountModel = new accountModel();
        $this->userModel = new UserModel();
    }

    public function getUserEvents($userId): array
    {
        return $this->accountModel->getUserEvents($userId);
    }

    public function getUser($id){
        return $this->userModel->getUser($id);
    }

    public function getUserByEmail($email){
        return $this->userModel->getUserByEmail($email);
    }

    public function setNom($nom){
        return $this->userModel->setNom($nom);
    }
    public function setPrenom($prenom){
        return $this->userModel->setPrenom($prenom);
    }
    public function setMail($mail){
        return $this->userModel->setMail($mail);
    }
    public function setTP($tp){
        return $this->userModel->setTP($tp);
    }
    public function setMdp($mdp){
        return $this->userModel->setMdp($mdp);
    }
}
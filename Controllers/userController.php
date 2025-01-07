<?php
require_once '/home/inf2pj06/public_html/Models/userModel.php';
require '/home/inf2pj06/public_html/Utils/DBConfig/Database.php';
require '/home/inf2pj06/public_html/Utils/DBConfig/Config.php';

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
}
?>

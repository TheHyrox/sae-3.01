<?php
require_once '../Models/userModel.php';
require '../Utils/DBConfig/Database.php';
require '../Utils/DBConfig/Config.php';

class UserController {
    private UserModel $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function getUser($id){
        return $this->model->getUser($id);
    }
}
?>

<?php
require_once '../Models/userModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel('localhost', 'inf2pj_06', 'root', '');
    }

    public function getUser($id){
        return $this->model->getUser($id);
    }
}
?>

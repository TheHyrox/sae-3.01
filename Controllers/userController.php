<?php
require_once './models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel('localhost', 'ex2_td5', 'root', '');
    }
}
?>

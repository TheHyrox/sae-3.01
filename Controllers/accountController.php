<?php

require '../Models/accountModel.php';
require_once '../Utils/DBConfig/Database.php';
require_once '../Utils/DBConfig/Config.php';

class accountController
{
    private accountModel $model;

    public function __construct()
    {
        $this->model = new accountModel();
    }

    public function getUserEvents($userId): array
    {
        return $this->model->getUserEvents($userId);
    }
}
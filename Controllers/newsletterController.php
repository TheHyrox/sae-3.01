<?php

require '../Models/newsletterModel.php';
require '../Utils/DBConfig/Databases.php';
require '../Utils/DBConfig/Config.php';

class newsletterController
{
    private newsletterModel $model;

    public function __construct()
    {
        $this->model = new newsletterModel();
    }
}
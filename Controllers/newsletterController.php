<?php

require '../Models/newsletterModel.php';
require '../Utils/DBConfig/Database.php';
require '../Utils/DBConfig/Config.php';

class newsletterController
{
    private newsletterModel $model;

    public function __construct()
    {
        $this->model = new newsletterModel();
    }

    public function getNewsletters(): array
    {
        return $this->model->getNewsletters();
    }
}
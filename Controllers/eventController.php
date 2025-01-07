<?php
namespace Controllers;

use eventModel;

require '../Models/eventModel.php';
require_once '../Utils/DBConfig/Database.php';
require_once '../Utils/DBConfig/Config.php';

class eventController
{
    private eventModel $model;

    public function __construct()
    {
        $this->model = new eventModel();
    }

    public function getEvents(): array
    {
        return $this->model->getEvents();
    }
}
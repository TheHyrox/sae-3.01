<?php
require '../Models/eventModel.php';
require '../Utils/DBConfig/Databases.php';
require '../Utils/DBConfig/Config.php';

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
<?php
require '../Models/eventModel.php';
if(!isset($_SESSION)){
    session_start();
}

class eventController
{
    private eventModel $model;

    public function __construct()
    {
        $this->model = new eventModel('localhost', 'inf2pj_06', 'root', '');
    }

    public function getEvents(): array
    {
        return $this->model->getEvents();
    }
}
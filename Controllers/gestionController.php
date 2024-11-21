<?php
require '../Models/productModel.php';
require '../Models/eventModel.php';
require_once '../Utils/DBConfig/Database.php';
require_once '../Utils/DBConfig/Config.php';

class gestionController
{
    private ProductModel $productModel;
    private eventModel $eventModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->eventModel = new EventModel();
    }

    public function getProductsByCategory($category): array
    {
        return $this->productModel->getProductsByCategory($category);
    }

    public function getCategories(): false|array
    {
        return $this->productModel->getCategories();
    }

    public function getGrades(): false|array
    {
        return $this->productModel->getGrades();
    }

    public function getEvents(): array
    {
        return $this->eventModel->getEvents();
    }
}
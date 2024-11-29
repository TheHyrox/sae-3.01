<?php
require 'Models/productModel.php';
require_once 'Utils/DBConfig/Database.php';
require_once 'Utils/DBConfig/Config.php';

class productController
{
    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function getProductsByCategory($category): array
    {
        return $this->model->getProductsByCategory($category);
    }

    public function getCategories(): false|array
    {
        return $this->model->getCategories();
    }

    public function getGrades(): false|array
    {
        return $this->model->getGrades();
    }
}
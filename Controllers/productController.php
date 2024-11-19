<?php
require '../Models/productModel.php';
if(isset($_SESSION)){
    session_start();
}
class productController
{
    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel('localhost', 'inf2pj_06', 'root', '');
    }

    public function getProductsByCategory($category): array
    {
        return $this->model->getProductsByCategory($category);
    }
}
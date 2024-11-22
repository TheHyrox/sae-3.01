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

    public function handleAddProduct(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nom_Produit'])) {
            $name = $_POST['Nom_Produit'];
            $description = $_POST['Desc_Produit'];
            $price = $_POST['Prix_Produit'];
            $category = $_POST['Cat_Produit'];
            $stock = $_POST['Stock_Produit'];

            $img = '';
            if (isset($_FILES['productPicture']) && $_FILES['productPicture']['error'] === UPLOAD_ERR_OK) {
                $img = '../Pictures/Uploads' . basename($_FILES['productPicture']['name']);
                move_uploaded_file($_FILES['productPicture']['tmp_name'], $img);
            }

            $this->productModel->addProduct($name, $price, $description, $category, $stock, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleAddGrade(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nom_Grade'])) {
            $name = $_POST['Nom_Grade'];
            $description = $_POST['Desc_Grade'];
            $price = $_POST['Prix_Grade'];

            $img = '';
            if (isset($_FILES['gradePicture']) && $_FILES['gradePicture']['error'] === UPLOAD_ERR_OK) {
                $img = '../Pictures/Uploads' . basename($_FILES['gradePicture']['name']);
                move_uploaded_file($_FILES['gradePicture']['tmp_name'], $img);
            }

            $this->productModel->addGrade($name, $price, $description, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleAddCategory(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Cat_Produit'])) {
            $category = $_POST['Cat_Produit'];
            $this->productModel->addCategory($category);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}
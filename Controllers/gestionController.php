<?php
require_once __DIR__ . '/../Models/productModel.php';
require_once __DIR__ . '/../Models/eventModel.php';
require_once __DIR__ . 'Utils/DBConfig/Database.php';
require_once __DIR__ . 'Utils/DBConfig/Config.php';


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

    public function handleAddEvent(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nom_Event']) && !isset($_POST['Id_Event'])) {
            $name = $_POST['Nom_Event'];
            $description = $_POST['Desc_Event'];
            $date = $_POST['Date_Event'];
            $lieu = $_POST['Lieu_Event'];
            $cat = $_POST['Cat_Event'];
            $nb_places = $_POST['Nb_Place_Event'];
            $prix = $_POST['Prix_Event'];

            $img = '';
            if (isset($_FILES['eventPicture']) && $_FILES['eventPicture']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['eventPicture']['name']);
                move_uploaded_file($_FILES['eventPicture']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->eventModel->addEvent($name, $description, $date, $lieu, $cat, $nb_places, $prix, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleEditEvent(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Id_Event'])) {
            $id = $_POST['Id_Event'];
            $name = $_POST['Nom_Event'];
            $description = $_POST['Desc_Event'];
            $date = $_POST['Date_Event'];
            $lieu = $_POST['Lieu_Event'];
            $cat = $_POST['Cat_Event'];
            $nb_places = $_POST['Nb_Place_Event'];
            $prix = $_POST['Prix_Event'];

            $img = $_POST['current_img'];
            if (isset($_FILES['eventPictureEdit']) && $_FILES['eventPictureEdit']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['eventPictureEdit']['name']);
                move_uploaded_file($_FILES['eventPictureEdit']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->eventModel->editEvent($id, $name, $description, $date, $lieu, $cat, $nb_places, $prix, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleAddProduct(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nom_Produit']) && !isset($_POST['Id_Produit'])) {
            $name = $_POST['Nom_Produit'];
            $description = $_POST['Desc_Produit'];
            $price = $_POST['Prix_Produit'];
            $category = $_POST['Cat_Produit'];
            $stock = $_POST['Stock_Produit'];

            $img = '';
            if (isset($_FILES['productPicture']) && $_FILES['productPicture']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['productPicture']['name']);
                move_uploaded_file($_FILES['productPicture']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->productModel->addProduct($name, $price, $description, $category, $stock, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleAddGrade(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['Id_Grade']) && !isset($_POST['Id_Produit']) && isset($_POST['Nom_Grade'])) {
            $name = $_POST['Nom_Grade'];
            $description = $_POST['Desc_Grade'];
            $price = $_POST['Prix_Grade'];

            $img = '';
            if (isset($_FILES['gradePicture']) && $_FILES['gradePicture']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['gradePicture']['name']);
                move_uploaded_file($_FILES['gradePicture']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->productModel->addGrade($name, $price, $description, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleAddCategory(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Cat_Produit']) && !isset($_POST['Id_Produit'])) {
            $category = $_POST['Cat_Produit'];
            $this->productModel->addCategory($category);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleEditProduct(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Id_Produit'])) {
            $id = $_POST['Id_Produit'];
            $name = $_POST['Nom_Produit'];
            $description = $_POST['Desc_Produit'];
            $price = $_POST['Prix_Produit'];
            $category = $_POST['Cat_Produit'];
            $stock = $_POST['Stock_Produit'];

            $img = $_POST['current_img'];
            if (isset($_FILES['productPictureEdit']) && $_FILES['productPictureEdit']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['productPictureEdit']['name']);
                move_uploaded_file($_FILES['productPictureEdit']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->productModel->editProduct($id, $name, $price, $description, $category, $stock, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function handleEditGrade(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Id_Grade'])) {
            $name = $_POST['Nom_Grade'];
            $description = $_POST['Desc_Grade'];
            $price = $_POST['Prix_Grade'];
            $id = $_POST['Id_Grade'];

            $img = $_POST['current_img'];
            if (isset($_FILES['gradePictureEdit']) && $_FILES['gradePictureEdit']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['gradePictureEdit']['name']);

                move_uploaded_file($_FILES['gradePictureEdit']['tmp_name'], "../Pictures/Uploads/" . $img);
            }

            $this->productModel->editGrade($id, $name, $price, $description, $img);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    public function getGradeById($id)
    {
        return $this->productModel->getGradeById($id);
    }

    public function getProductById(mixed $id)
    {
        return $this->productModel->getProductById($id);
    }

    public function getEventById(mixed $id)
    {
        return $this->eventModel->getEventById($id);
    }
}
<?php

use DBConfig\Database;

class productModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getProductsByCategory($category): false|array
    {
        $req = $this->db->prepare('SELECT Id_Produit, Nom_Produit, URL_Img_Produit, Desc_Produit, Prix_Produit, Stock_Produit FROM PRODUIT WHERE Cat_Produit = :category AND Nom_Produit IS NOT NULL');
        $req->execute(array('category' => $category));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategories(): false|array
    {
        $req = $this->db->prepare('SELECT DISTINCT Cat_Produit FROM PRODUIT');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getGrades(): false|array
    {
        $req = $this->db->prepare('SELECT Id_Grade, Nom_Grade, Desc_Grade, URL_Img_Grade, Prix_Grade FROM GRADE');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price, $description, $category, $stock, $img): void
    {
        $req = $this->db->prepare('INSERT INTO PRODUIT (Nom_Produit, Prix_Produit, Desc_Produit, Cat_Produit, Stock_Produit, URL_Img_Produit) VALUES (:name, :price, :description, :category, :stock, :img)');
        $req->execute(array('name' => $name, 'price' => $price, 'description' => $description, 'category' => $category, 'stock' => $stock, 'img' => $img));
    }

    public function addGrade(mixed $name, mixed $price, mixed $description, string $img): void
    {
        $req = $this->db->prepare('INSERT INTO GRADE (Nom_Grade, Prix_Grade, Desc_Grade, URL_Img_Grade) VALUES (:name, :price, :description, :img)');
        $req->execute(array('name' => $name, 'price' => $price, 'description' => $description, 'img' => $img));
    }

    public function addCategory($category): void
    {
        $req = $this->db->prepare('INSERT INTO PRODUIT (Cat_Produit) VALUES (:category)');
        $req->execute(array('category' => $category));
    }

    public function editProduct($id, $name, $price, $description, $category, $stock, $img): void
    {
        $req = $this->db->prepare('UPDATE PRODUIT SET Nom_Produit = :name, Prix_Produit = :price, Desc_Produit = :description, Cat_Produit = :category, Stock_Produit = :stock, URL_Img_Produit = :img WHERE Id_Produit = :id');
        $req->execute(array('name' => $name, 'price' => $price, 'description' => $description, 'category' => $category, 'stock' => $stock, 'img' => $img, 'id' => $id));
    }

    public function editGrade($id, $name, $price, $description, $img): void
    {
        $req = $this->db->prepare('UPDATE GRADE SET Nom_Grade = :name, Prix_Grade = :price, Desc_Grade = :description, URL_Img_Grade = :img WHERE Id_Grade = :id');
        $req->execute(array('name' => $name, 'price' => $price, 'description' => $description, 'img' => $img, 'id' => $id));
    }

    public function getGradeById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM GRADE WHERE Id_Grade = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductById(mixed $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM PRODUIT WHERE Id_Produit = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
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
        $req = $this->db->prepare('SELECT Nom_Produit, URL_Img_Produit, Desc_Produit, Prix_Produit FROM produit WHERE Cat_Produit = :category');
        $req->execute(array('category' => $category));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategories(): false|array
    {
        $req = $this->db->prepare('SELECT DISTINCT Cat_Produit FROM produit');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getGrades(): false|array
    {
        $req = $this->db->prepare('SELECT Id_Grade, Nom_Grade, Desc_Grade, URL_Img_Grade, Prix_Grade FROM grade');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
<?php

class productModel
{
    private PDO $db;

    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
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
        $req = $this->db->prepare('SELECT Nom_Grade, Desc_Grade, URL_Img_Grade, Prix_Grade FROM grade');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
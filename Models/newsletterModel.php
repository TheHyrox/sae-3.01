<?php

use DBConfig\Database;

class newsletterModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getNewsletters(): false|array
    {
        $req = $this->db->prepare('SELECT Titre_News, Texte_News, URL_Image_News, Date_News, Prenom_User, Nom_User FROM NEWSLETTER JOIN UTILISATEUR ON NEWSLETTER.Id_User = UTILISATEUR.Id_User');
        $req->execute();
        return $req->fetchAll();
    }
}
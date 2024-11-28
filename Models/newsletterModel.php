<?php
namespace Models;

use DBConfig\Database;
use PDO;

class newsletterModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getNewsletters(): false|array
    {
        $req = $this->db->prepare('SELECT Titre_News, Texte_News, URL_Image_News, Date_News, Visible, Prenom_User, Nom_User FROM NEWSLETTER JOIN UTILISATEUR ON NEWSLETTER.Id_User = UTILISATEUR.Id_User');
        $req->execute();
        return $req->fetchAll();
    }

    public function addNewsletter(string $title, string $text, int $visible): bool
    {
        $req = $this->db->prepare('INSERT INTO NEWSLETTER (Titre_News, Texte_News, Visible, Date_News) VALUES (?, ?, ?, NOW())');
        return $req->execute([$title, $text, $visible]);
    }
}
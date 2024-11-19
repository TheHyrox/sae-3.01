<?php

class eventModel
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

    public function getEvents(): false|array
    {
        $req = $this->db->prepare('SELECT * FROM event');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
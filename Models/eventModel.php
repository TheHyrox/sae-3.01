<?php

use DBConfig\Database;

class eventModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getEvents(): false|array
    {
        $req = $this->db->prepare('SELECT * FROM EVENT');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEvent($name, $description, $date, $lieu, $cat, $nb_places, $prix, $img): void
    {
        $req = $this->db->prepare('INSERT INTO EVENT (Nom_Event, Desc_Event, Date_Event, Lieu_Event, Cat_Event, Nb_Place_Event, Prix_Event, URL_Img_Event) VALUES (:name, :description, :date, :location, :cat, :nb_places, :prix, :img)');
        $req->execute([
            'name' => $name,
            'description' => $description,
            'date' => $date,
            'location' => $lieu,
            'cat' => $cat,
            'nb_places' => $nb_places,
            'prix' => $prix,
            'img' => $img
        ]);
    }
}
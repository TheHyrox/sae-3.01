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

    public function editEvent(mixed $id, mixed $name, mixed $description, mixed $date, mixed $lieu, mixed $cat, mixed $nb_places, mixed $prix, mixed $img): void
    {
        $req = $this->db->prepare('UPDATE EVENT SET Nom_Event = :name, Desc_Event = :description, Date_Event = :date, Lieu_Event = :location, Cat_Event = :cat, Nb_Place_Event = :nb_places, Prix_Event = :prix, URL_Img_Event = :img WHERE Id_Event = :id');
        $req->execute([
            'id' => $id,
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

    public function getEventById(mixed $id)
    {
        $req = $this->db->prepare('SELECT * FROM EVENT WHERE Id_Event = :id');
        $req->execute(['id' => $id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
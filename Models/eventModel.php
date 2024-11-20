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
        $req = $this->db->prepare('SELECT * FROM event');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
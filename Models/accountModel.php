<?php

require_once '../Utils/DBConfig/Database.php';

class accountModel
{
    private PDO $db;

    public function __construct() {
        $this->db = DBConfig\Database::getConnection();
    }

    public function getUserEvents($userId): false|array
    {
        $req = $this->db->prepare('
            SELECT e.*
            FROM EVENT e
            JOIN BILLET b ON e.Id_Event = b.Id_Event
            JOIN COMMANDE c ON b.Id_Cmd = c.Id_Cmd
            WHERE c.Id_User = :userId
        ');
        $req->execute(['userId' => $userId]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
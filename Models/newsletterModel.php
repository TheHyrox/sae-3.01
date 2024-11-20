<?php

use DBConfig\Database;

class newsletterModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }
}
<?php

class UserModel {
    private $bdd;

    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
?>

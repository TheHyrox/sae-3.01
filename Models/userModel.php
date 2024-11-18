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

    public function getUser($id) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE Id_User = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getUserByEmail($email) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE Email = :email');
        $req->execute(array('email' => $email));
        return $req->fetch();
    }

    public function addUser($email, $motdepasse, $grp_tp_user) {
        $req = $this->bdd->prepare('INSERT INTO user (Email, Password, Grp_TP_User) VALUES (:email, :motdepasse, :grp_tp_user)');
        $req->execute(array('email' => $email, 'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT), 'grp_tp_user' => 1));}
}
?>

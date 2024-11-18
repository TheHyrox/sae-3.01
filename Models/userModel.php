<?php

class UserModel {
    private PDO $bdd;

    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getUser($id) {
        $req = $this->bdd->prepare('SELECT * FROM utilisateur WHERE Id_User = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getUserByEmail($email) {
        $req = $this->bdd->prepare('SELECT * FROM utilisateur WHERE Email = :email');
        $req->execute(array('email' => $email));
        return $req->fetch();
    }

    public function addUser($email, $motdepasse, $grp_tp_user): void
    {
        $req = $this->bdd->prepare('INSERT INTO utilisateur (Mail_User, Mdp_User, Grp_TP_User) VALUES (:email, :motdepasse, :grp_tp_user)');
        $req->execute(array('email' => $email, 'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT), 'grp_tp_user' => $grp_tp_user));
    }

    public function emailExists($email): bool
    {
        $req = $this->bdd->prepare('SELECT Mail_User FROM utilisateur WHERE Mail_User = :email');
        $req->execute(array('email' => $email));
        return $req->rowCount() > 0;
    }

    public function passwordIsValid($password): bool
    {
        $req = $this->bdd->prepare('SELECT Mdp_User FROM utilisateur WHERE Mdp_User = :password');
        $req->execute(array('password' => $password));
        return password_verify($password, $req->fetch()['Mdp_User']);
    }
}
?>

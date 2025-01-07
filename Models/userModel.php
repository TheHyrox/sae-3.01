<?php

use DBConfig\Database;

class UserModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getUser($id) {
        $req = $this->db->prepare('SELECT * FROM UTILISATEUR WHERE Id_User = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getUserByEmail($email) {
        $req = $this->db->prepare('SELECT * FROM UTILISATEUR WHERE Mail_User = :email');
        $req->execute(array('email' => $email));
        return $req->fetch();
    }

    public function addUser($email, $motdepasse, $grp_tp_user): void {
        $req = $this->db->prepare('INSERT INTO UTILISATEUR (Mail_User, Mdp_User, Grp_TP_User) VALUES (:email, :motdepasse, :grp_tp_user)');
        $req->execute(array('email' => $email, 'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT), 'grp_tp_user' => $grp_tp_user));
    }

    public function emailExists($email): bool {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM UTILISATEUR WHERE Mail_User = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function passwordIsValid($email, $password): bool {
        $stmt = $this->db->prepare("SELECT Mdp_User FROM UTILISATEUR WHERE Mail_User = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $hashedPassword = $stmt->fetchColumn();
        return password_verify($password, $hashedPassword);
    }

    public function isAdmin($email): bool {
        $stmt = $this->db->prepare("SELECT Niv_Acces_User FROM UTILISATEUR WHERE Mail_User = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() < 4;
    }

    public function getGrpTPUser($email): ?string {
        $stmt = $this->db->prepare("SELECT Grp_TP_User FROM UTILISATEUR WHERE Mail_User = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function setNom($id,$nom): void {
        $req = $this->db->prepare('UPDATE UTILISATEUR SET Nom_User = :nom WHERE Id_User = :id');
        $req->execute(array('id' => $id, 'nom' => $nom));
    }

    public function setPrenom($id,$prenom): void {
        $req = $this->db->prepare('UPDATE UTILISATEUR SET Prenom_User = :prenom WHERE Id_User = :id');
        $req->execute(array('id' => $id, 'prenom' => $prenom));
    }

    public function setMail($id,$mail): void {
        $req = $this->db->prepare('UPDATE UTILISATEUR SET Mail_User = :mail WHERE Id_User = :id');
        $req->execute(array('id' => $id, 'mail' => $mail));
    }

    public function setTP($id,$tp): void {
        $req = $this->db->prepare('UPDATE UTILISATEUR SET Grp_TP_User = :tp WHERE Id_User = :id');
        $req->execute(array('id' => $id, 'tp' => $tp));
    }

    public function setMdp($id,$mdp): void {
        $req = $this->db->prepare('UPDATE UTILISATEUR SET Mdp_User = :mdp WHERE Id_User = :id');
        $req->execute(array('id' => $id, 'mdp' => password_hash($mdp, PASSWORD_DEFAULT)));
    }
}
?>
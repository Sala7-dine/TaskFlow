<?php

require_once '../config/database.php';

class User extends Database{

    private $connexion;

    public function __construct() {
        $this->connexion = $this->connect();
    }

    public function create($name, $email){

        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        try {

            $stmt->execute();
            return $this->connexion->lastInsertId();

        } catch (PDOException $e) {

            die("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());

        }
    }

    public function userExists($email) {
        $query = "SELECT id FROM users WHERE email = :email";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retourne true si l'utilisateur existe, sinon false
        return $user ? $user['id'] : false;
    }




}
?>

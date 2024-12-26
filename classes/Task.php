<?php
require_once '../config/database.php';

class Task extends Database {

    private $connexion;

    public function __construct() {
        $this->connexion = $this->connect();
    }

    public function create($title, $description, $type, $status, $userId){
        $query = "INSERT INTO tasks (title, description, type, status, user_id) VALUES (:title, :description, :type, :status, :user_id)";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $userId);

        try {
            $stmt->execute();
            return $this->connexion->lastInsertId();
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion de la tâche : " . $e->getMessage());
        }

    }

}
?>

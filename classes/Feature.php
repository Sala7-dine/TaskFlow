<?php

require_once 'Task.php';

class Feature extends Task{
   
    private $priority;

    public function __construct() {
        parent::__construct();
    }
    
    public function createFeature($title, $description, $status, $type ,  $userId, $priority) {
        
        // D'abord, on crée la tâche de base
        $taskId = $this->create($title, $description, $type, $status, $userId);
        
        if ($taskId) {
            // Ensuite, on ajoute les informations spécifiques aux features
            $query = "INSERT INTO features (task_id, priority) VALUES (:task_id, :priority)";
            $stmt = $this->connexion->prepare($query);
            
            $stmt->bindParam(':task_id', $taskId);
            $stmt->bindParam(':priority', $priority);
            
            try {
                $stmt->execute();
                return $taskId;
            } catch (PDOException $e) {
                die("Erreur lors de l'insertion de la feature : " . $e->getMessage());
            }
        }
        return false;
    }
}


?>
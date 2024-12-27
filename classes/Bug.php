<?php
require_once 'Task.php';

class Bug extends Task {
    
    private $severity;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function createBug($title, $description, $status, $type , $userId, $severity) {
        
        $taskId = $this->create($title, $description, $type,$status, $userId);
        
        if ($taskId) {
            
            $query = "INSERT INTO bugs (task_id, severity) VALUES (:task_id, :severity)";
            $stmt = $this->connexion->prepare($query);
            
            $stmt->bindParam(':task_id', $taskId);
            $stmt->bindParam(':severity', $severity);
            
            try {
                $stmt->execute();
                return $taskId;
            } catch (PDOException $e) {
                die("Erreur lors de l'insertion du bug : " . $e->getMessage());
            }
        }

        return false;
    }
}


?>
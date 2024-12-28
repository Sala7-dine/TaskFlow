<?php
require_once '../config/database.php';

class Task extends Database {

    protected $connexion;

    public function __construct() {
        $this->connexion = $this->connect();
    }

    public function create($title, $description, $type, $status, $userId){
        $query = "INSERT INTO tasks (title, description, status ,type, assigned_to) VALUES (:title, :description, :status, :type , :assigned_to)";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':assigned_to', $userId);

        try {
            $stmt->execute();
            return $this->connexion->lastInsertId();
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion de la tâche : " . $e->getMessage());
        }

    }


    public function getTasks(){

        $query = "SELECT T.id as task_id , T.title as titre , U.id as user_id , created_at , U.name as username , type , status FROM tasks T join users U on T.assigned_to = U.id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
        
    }


    public function updateStatus($task_Id , $status){

        $query = "UPDATE tasks set status = :status WHERE id = :task_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':task_id', $task_Id);
        $stmt->bindParam(':status', $status);

        try {
            $stmt->execute();
            return $task_Id;
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion de la tâche : " . $e->getMessage());
        }
        
    }


    public function getTaskDetails($taskId) {
        $query = "
            SELECT *
            FROM tasks t
            JOIN users u ON t.assigned_to = u.id
            LEFT JOIN bugs b ON t.id = b.task_id  
            LEFT JOIN features f ON t.id = f.task_id
            WHERE t.id = :task_id;
        ";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

}
?>

<?php
require_once '../classes/Task.php';

$Task = new Task();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $taskId = intval($_POST['task_id']);
    $status = $_POST['status'];

    // echo $taskId . "<br>";
    // echo $status;
    $Task->updateStatus($taskId , $status);
    header("Location:index.php");

}



?>
<?php

use PgSql\Lob;

    require "../classes/Task.php";
    require "../classes/Bug.php";
    require "../classes/Feature.php";

    session_start();


    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id_user = $_SESSION['user_id'] ?? "";
        $title = $_POST["title"] ?? "";
        $description = $_POST["description"] ?? "";
        $assinedTo = $_POST["assinedTo"] ?? "";
        $type = $_POST["type"] ?? "";
        $severity = $_POST["severity"] ?? "";
        $priority = $_POST["priority"] ?? "";
        $status = "To Do";


        if($type === "bug"){

            $bug = new Bug();
            $bug->createBug($title , $description , $status , $type , $assinedTo , $severity);

            if($bug){
                header("Location:index.php");
            }else{
                echo '<script>alert("'.$bug.'")</script>';
                header("Location:index.php");
            }

        }elseif($type === "feature"){

            $feature = new Feature();
            $feature->createFeature($title , $description , $status , $type , $assinedTo , $priority);

            if($feature){
                header("Location:index.php");
            }else{
                echo '<script>alert("'.$feature.'")</script>';
                header("Location:index.php");
            }

        }else{

            $Task = new Task();
            $Task->create($title , $description , $type ,  $status , $assinedTo);

            if($Task){
                header("Location:index.php");
            }else{
                echo '<script>alert("'.$Task.'")</script>';
                header("Location:index.php");
            }

        }

    }


?>
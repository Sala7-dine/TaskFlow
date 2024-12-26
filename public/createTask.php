<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $title = $_POST["title"];
        $description = $_POST["description"];
        $assinedTo = $_POST["assinedTo"];
        $type = $_POST["type"];

        //$severity = $_POST["severity"];
        //$priority = $_POST["priority"];

        echo $title;
        echo "<br>";
        echo $description;
        echo "<br>";
        echo $assinedTo;
        echo "<br>";
        echo $type;
        echo "<br>";

        //echo $severity;
        //echo $priority;
        
        echo "<br>";

    }


?>
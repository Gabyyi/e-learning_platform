<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $title=htmlspecialchars($_POST['title']);
    $duration=htmlspecialchars($_POST['duration']);
    $pedagogyID=htmlspecialchars($_POST['submission_id']);
    $instructorID=htmlspecialchars($_POST['submission_ID']);

    $database_query="INSERT INTO proiect_baza_de_date.lessons (lessonID, pedagogyID, instructorID, lessonTitle, duration) VALUES (NULL, '$pedagogyID', '$instructorID', '$title', '$duration')";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: addlessons.php?id=$pedagogyID&ID=$instructorID");
    exit();
    $database_connection->close();

?>
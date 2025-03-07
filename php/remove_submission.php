<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
        echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    
    $assessmentID = htmlspecialchars($_GET['id']);
    echo $assessmentID;
    

    $database_query = "UPDATE proiect_baza_de_date.student_assessment SET assignmentURL = NULL, userID = '$_SESSION[userID]' WHERE assessmentID = '$assessmentID'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: homework.php?id=$assessmentID");
    exit();
    $database_connection->close();

?>
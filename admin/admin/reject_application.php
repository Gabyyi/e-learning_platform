<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $submission_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $database_query="DELETE FROM proiect_baza_de_date.applications WHERE applicationID='$submission_id'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: view_applications.php");
    exit();
    mysqli_close($database_connection);

?>
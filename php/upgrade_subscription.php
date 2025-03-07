<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $subscription = mysqli_real_escape_string($database_connection, $_GET['subscription']);
    $database_query = "UPDATE proiect_baza_de_date.users SET subscription = '$subscription' WHERE userID = '$_SESSION[userID]'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    $_SESSION['subscription'] = $subscription;
   
    header("Location: profile.php");
    exit();
    $database_connection->close();

?>
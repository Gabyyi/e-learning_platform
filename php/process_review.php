<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $courseID = intval($_GET['id']);
    $rating = $_POST['rating'];
    $opinion = $_POST['opinion'];
    $currentDate = date('Y-m-d');
    echo $courseID." ".$rating." ".$opinion." ".$currentDate;

    $database_query = "INSERT INTO proiect_baza_de_date.review (reviewID, userID, courseID, rating, comment, reviewDate) VALUES ( NULL, '".$_SESSION['userID']."', '$courseID',  '$rating', '$opinion', '$currentDate')";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
   
    header("Location: home.php");
    exit();
    $database_connection->close();

?>
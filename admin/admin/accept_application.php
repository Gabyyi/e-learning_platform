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

    $database_query="SELECT * FROM proiect_baza_de_date.applications WHERE applicationID='$submission_id'";
    $database_result=mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    $line = mysqli_fetch_assoc($database_result);
    if ($line) {
        $userID=$line['userID'];    
        $fullName=$line['fullName'];
        $email=$line['email'];
        $subject=$line['subject'];
        $bio=$line['bio'];

        $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . intval($line['subject']);
        $pedagogy_result = mysqli_query($database_connection, $database_query);
        $pedagogy = mysqli_fetch_assoc($pedagogy_result)['pedagogyType'] ?? 'Unknown';
    } else {
        die("No application found with ID: $submission_id");
    }

    echo $pedagogy;


    $database_query="INSERT INTO proiect_baza_de_date.instructors (instructorID, userID, fullName, email, bio, courseName, pedagogyID) VALUES ( NULL , '$userID' , '$fullName' , '$email' , '$bio', '$pedagogy', '$subject' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $database_query="DELETE FROM proiect_baza_de_date.applications WHERE applicationID='$submission_id'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $database_query="UPDATE proiect_baza_de_date.users SET role='Instructor' WHERE userID='$userID'";

    header("Location: view_applications.php");
    exit();
    mysqli_close($database_connection);

?>
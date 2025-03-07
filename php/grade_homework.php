<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    // echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $grade = isset($_POST['grade']) ? $_POST['grade'] : null;
    echo $grade;
    $studentAssessmentID = isset($_POST['studentAssessmentID']) ? $_POST['studentAssessmentID'] : null;
    $assessmentID=isset($_POST['assessmentID']) ? $_POST['assessmentID'] : null;
    // echo $studentAssessmentID;


    $database_query = "UPDATE proiect_baza_de_date.student_assessment SET score='$grade' WHERE studentAssessmentID=" . $_POST['studentAssessmentID'];
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: view_homeworks.php?id=$assessmentID");
    exit();
    $database_connection->close();

?>
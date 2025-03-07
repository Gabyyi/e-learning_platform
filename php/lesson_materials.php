<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
        echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $lessonID=htmlspecialchars($_POST['submission_id']);
    $option=htmlspecialchars($_POST['option']);

    $materialTitle=htmlspecialchars($_POST['materialTitle']);

    $fileName = basename($_FILES['materialFile']['name']);
    $filePath = $_FILES['materialFile']['tmp_name'];
    if (isset($_FILES['materialFile'])) {
        $fileName = basename($_FILES['materialFile']['name']);
        $targetDir = "files/";
        $materialURL = $targetDir . $fileName;

        if (move_uploaded_file($filePath, $materialURL)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded.";
    }


    $assessmentTitle=htmlspecialchars($_POST['assessmentTitle']);
    $assessmentDescription=htmlspecialchars($_POST['assessmentDescription']);

    $fileName = basename($_FILES['assessmentFile']['name']);
    $filePath = $_FILES['assessmentFile']['tmp_name'];
    if (isset($_FILES['assessmentFile'])) {
        $fileName = basename($_FILES['assessmentFile']['name']);
        $targetDir = "files/";
        $assessmentURL = $targetDir . $fileName;

        if (move_uploaded_file($filePath, $assessmentURL)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded.";
    }

    // $database_query="INSERT INTO proiect_baza_de_date.materials (materialID, lessonID, materialType, materialURL, title) VALUES (NULL, '$lessonID', '$option', '$materialURL', '$materialTitle')";
    // mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    
    if ($option === 'Material') {
        $database_query = "INSERT INTO proiect_baza_de_date.materials (materialID, lessonID, materialType, materialURL, title) VALUES (NULL, '$lessonID', '$option', '$materialURL', '$materialTitle')";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    } elseif ($option === 'Assignment') {
        $database_query = "INSERT INTO proiect_baza_de_date.assessments (assessmentID, lessonID, assessmentType, maxScore, title, description, assessmentURL, assignment) VALUES (NULL, '$lessonID', '$option', '100', '$assessmentTitle', '$assessmentDescription', '$assessmentURL', NULL)";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

        $currentdate = date('Y-m-d H:i:s');
        // $database_query = "INSERT INTO proiect_baza_de_date.student_assessment (studentAssessmentID, userID, lessonID, assessmentID, score, submissionDate, assignmentURL) VALUES (NULL, '$_SESSION[userID]', '$lessonID', '$assessmentID', NULL, '$currentdate', NULL)";
        
        $database_query = "
        INSERT INTO proiect_baza_de_date.student_assessment (studentAssessmentID, userID, lessonID, assessmentID, score, submissionDate, assignmentURL)
        SELECT 
            NULL,
            c.userID, 
            l.lessonID, 
            a.assessmentID,
            (SELECT score FROM proiect_baza_de_date.student_assessment WHERE userID = c.userID AND lessonID = l.lessonID AND assessmentID = a.assessmentID ORDER BY studentAssessmentID DESC LIMIT 1) AS score,
            (SELECT submissionDate FROM proiect_baza_de_date.student_assessment WHERE userID = c.userID AND lessonID = l.lessonID AND assessmentID = a.assessmentID ORDER BY studentAssessmentID DESC LIMIT 1) AS submissionDate,
            (SELECT assignmentURL FROM proiect_baza_de_date.student_assessment WHERE userID = c.userID AND lessonID = l.lessonID AND assessmentID = a.assessmentID ORDER BY studentAssessmentID DESC LIMIT 1) AS assignmentURL
        FROM 
            courses c
        JOIN 
            lessons l 
        ON 
            c.pedagogyID = l.pedagogyID
        JOIN 
            assessments a 
        ON 
            l.lessonID = a.lessonID;
        ";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    }   
    // mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: materials.php?id=$lessonID");
    exit();
    $database_connection->close();

?>
<?php
    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
        echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $assessmentID=htmlspecialchars($_POST['submission_id']);
    $lessonID=htmlspecialchars($_POST['submission_ID']);
    echo $lessonID;

    $fileName = basename($_FILES['assignment']['name']);
    $targetDir = "files/";
    $assignment = "";
    if (isset($_FILES['assignment']) && $_FILES['assignment']['error'] == UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['assignment']['name']);
        $filePath = $_FILES['assignment']['tmp_name'];
        $targetDir = "files/";
        $assignment = $targetDir . $fileName;

        if (move_uploaded_file($filePath, $assignment)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    echo "<br>this is the file: ".$assignment;
    if (!isset($assignment) || $assignment == $targetDir) {
        echo "No file was uploaded.";
        
    }

    $submissionDate = date('Y-m-d H:i:s');
    // $database_query = "UPDATE proiect_baza_de_date.student_assessment SET assignmentURL = '$assignment', submissionDate = '$submissionDate' WHERE userID = '$_SESSION[userID]' AND assessmentID = '$assessmentID'";
    
    $database_query = "INSERT INTO proiect_baza_de_date.student_assessment (studentAssessmentID, userID, lessonID, assessmentID, score, submissionDate, assignmentURL) VALUES ( NULL, '$_SESSION[userID]', '$lessonID', '$assessmentID', NULL, '$submissionDate', '$assignment' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    header("Location: homework.php?id=$assessmentID&lessonID=$lessonID");
    exit();
    $database_connection->close();
?>
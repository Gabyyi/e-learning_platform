<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $teacher = htmlspecialchars($_POST['teacher']);

    $pedagogy_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . $_POST['pedagogy'];
    $pedagogy_result = mysqli_query($database_connection, $pedagogy_query);
    $pedagogy_row = mysqli_fetch_assoc($pedagogy_result);
    $courseName = $pedagogy_row['pedagogyType'];

    $teacher_query = "SELECT instructorID FROM proiect_baza_de_date.instructors WHERE fullName = '$teacher'";
    $teacher_result = mysqli_query($database_connection, $teacher_query);
    $teacher_row = mysqli_fetch_assoc($teacher_result);
    $teacherID = $teacher_row['instructorID'];

    $subject_query = "SELECT description FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . $_POST['pedagogy'];
    $subject_result = mysqli_query($database_connection, $subject_query);
    $subject_row = mysqli_fetch_assoc($subject_result);
    $subject = $subject_row['description'];

    $level_query = "SELECT level FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . $_POST['pedagogy'];
    $level_result = mysqli_query($database_connection, $level_query);
    $level_row = mysqli_fetch_assoc($level_result);
    $level = $level_row['level'];

    $duration_query = "SELECT duration FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . $_POST['pedagogy'];
    $duration_result = mysqli_query($database_connection, $duration_query);
    $duration_row = mysqli_fetch_assoc($duration_result);
    $duration = $duration_row['duration'];


    // $database_query = "INSERT INTO proiect_baza_de_date.users (fullName, email) VALUES ('$teacher', '$pedagogy')";
    $database_query = "INSERT INTO proiect_baza_de_date.courses (courseID , userID , courseName , pedagogyID , instructorID , fullName , subject , level , duration) VALUES ( NULL, '$_SESSION[userID]', '$courseName', '{$_POST['pedagogy']}' , '$teacherID' , '$teacher' , '$subject' , '$level' , '$duration' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $currentdate = date('Y-m-d H:i:s');
    $course_query = "SELECT courseID FROM proiect_baza_de_date.courses WHERE courseName = '$courseName'";
    $course_result = mysqli_query($database_connection, $course_query);
    $course_row = mysqli_fetch_assoc($course_result);
    $courseID = $course_row['courseID'];
    $database_query = "INSERT INTO proiect_baza_de_date.enrollments (enrollmentID, userID, courseID, enrollDate, completionStatus) VALUES (NULL, '$_SESSION[userID]', '$courseID', '$currentdate', 'In Progress')";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    
    // $database_query = "
    //      INSERT INTO proiect_baza_de_date.student_assessment (studentAssessmentID, userID, lessonID, assessmentID, score, submissionDate, assignmentURL)
    //      SELECT NULL, '$_SESSION[userID]', a.lessonID, a.assessmentID, NULL, NULL, NULL
    //      FROM assessments a
    //      JOIN lessons l ON a.lessonID = l.lessonID
    //      JOIN courses c ON l.pedagogyID = c.pedagogyID
    //      WHERE c.userID = '$_SESSION[userID]';
    // ";
    //      INSERT INTO proiect_baza_de_date.student_assessment (studentAssessmentID, userID, lessonID, assessmentID, score, submissionDate, assignmentURL)
    //      SELECT NULL, c.userID, a.lessonID, a.assessmentID, NULL, NULL, NULL
    //      FROM assessments a
    //      JOIN lessons l ON a.lessonID = l.lessonID
    //      JOIN courses c ON l.pedagogyID = c.pedagogyID;
    // ";
 
    // if (!$database_connection->query($database_query)) {
    //     throw new Exception("Query error: " . $database_connection->error);
    // }

    header("Location: home.php");
    exit();
    $database_connection->close();
    

?>

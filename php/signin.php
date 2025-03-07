<?php
    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

	$database_query="SELECT * FROM proiect_baza_de_date.users WHERE email='$_POST[email]' AND password='$_POST[password]'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    $query_result = mysqli_query($database_connection, $database_query);
    if (mysqli_num_rows($query_result) == 0) {
        // echo "Invalid email or password.";
        // header("Location: ../login.html");
        $_SESSION['error_message'] = 'Invalid email or password.';
        echo "<script>alert('Invalid email or password.');</script>";
        header("Location: login.php");
        exit();
    }else{
	    // $query_result=mysqli_query($database_connection, $database_query);
	    while ($line=mysqli_fetch_assoc($query_result)) {
            $_SESSION['userID']=$line['userID'];
            $_SESSION['fullName']=$line['fullName'];
            $_SESSION['email']=$line['email'];
            $_SESSION['password']=$line['password'];
            $_SESSION['role']=$line['role'];
            $_SESSION['subscription']=$line['subscription'];
            $_SESSION['joinDate']=$line['joinDate'];
            echo "User ID: ".$_SESSION['userID']."<br>".$_SESSION['fullName']."<br>".$_SESSION['email']."<br>".$_SESSION['password']."<br>".$_SESSION['role']."<br>".$_SESSION['subscription']."<br>".$_SESSION['joinDate']."<br>";
        }
    }

    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/admin/view_applications.php");
    } elseif ($_SESSION['role'] == 'Instructor') {
        header("Location: home_instructor.php");
    } else {
        header("Location: home.php");
    }

    // header("Location: home.php");
    exit();
    mysqli_close($database_connection);
?>
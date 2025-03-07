<?php
    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    $currentdate = date('Y-m-d H:i:s');

	$database_query="INSERT INTO proiect_baza_de_date.users (userID,fullName,email,password,role, subscription,joinDate) VALUES ( NULL , '$_POST[fullname]' , '$_POST[email]' , '$_POST[password]' , 'Student' , '$_POST[subscription]', '$currentdate' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

	$database_query="SELECT * FROM proiect_baza_de_date.users WHERE fullName='$_POST[fullname]'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
    
	$query_result=mysqli_query($database_connection, $database_query);
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
   
	header("Location: home.php");
    exit();
	mysqli_close($database_connection);
?>

<?php
session_start();
$databasename="proiect_baza_de_date";
$database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
// echo "Successfully connected to database: $databasename";
session_regenerate_id(true);

if (isset($_GET['pedagogyID'])) {
    $pedagogyID = $_GET['pedagogyID'];

    $teacher_query = "SELECT fullName FROM proiect_baza_de_date.instructors WHERE pedagogyID = ?";
    $stmt = $database_connection->prepare($teacher_query);
    $stmt->bind_param("i", $pedagogyID);
    $stmt->execute();
    $result = $stmt->get_result();

    $teachers = [];
    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }

    echo json_encode($teachers);
}
?>

<?php

    session_start();
    $databasename="proiect_baza_de_date";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

    if (!$database_connection) {
        echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = "SELECT materialURL FROM materials WHERE materialID = ?";
        $stmt = $database_connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($materialURL);
            $stmt->fetch();
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $materialURL . '"');
            readfile($materialURL);
        } else {
            echo "No PDF found with the given ID.";
        }
        $stmt->close();
    } else {
        echo "No ID parameter provided.";
    }
    $database_connection->close();

?>
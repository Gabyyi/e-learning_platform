<?php
session_start();
$databasename="proiect_baza_de_date";
$database_connection=mysqli_connect("localhost" , "root" , "" , "proiect_baza_de_date");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
// echo "Successfully connected to database: $databasename";
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="../../css/home.css">
    <style>
        .courses{
            margin-top: 1rem;
        }
    </style>


    <style>
        body{ background-image: url("../images/bg-texture.png")}
    </style>

</head>
<body>

    <!-- aici e simplu de comentat, navbar -->
    <nav>
        <div class="container nav_container">
            <a href="../../index.php"><h4>PedaONLINE</h4></a>
            <ul class="nav_menu">
                <li><a href="view_allteachers.php">Teachers</a></li>
                <li><a href="../../php/logout.php">ADMIN(logout)</a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    
   
    <div class="courses">
        <div class="container">
            <h1>Teacher Application</h1>
        </div>
        <div class="container courses_container">
            <?php
            $database_query = "SELECT * FROM proiect_baza_de_date.applications";
            mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
            $result=mysqli_query($database_connection, $database_query);

            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="course_info">
                        <h5>Application: <?php echo htmlspecialchars($row['applicationID']); ?></h5>
                        <p><?php echo htmlspecialchars($row['fullName']); ?></p>
                        <p><?php echo htmlspecialchars($row['email']); ?></p>
                        <?php
                            $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = " . intval($row['subject']);
                            $pedagogy_result = mysqli_query($database_connection, $database_query);
                            $pedagogy = mysqli_fetch_assoc($pedagogy_result)['pedagogyType'] ?? 'Unknown';
                        ?>
                        <p><?php echo htmlspecialchars($pedagogy); ?></p>
                        <p><?php echo htmlspecialchars($row['bio']); ?></p>
                        <?php
                            echo '<a class="btn btn-primary" href="reject_application.php?id=' . $row['applicationID'] . '" style="margin-left: 10px;">Reject</a>';
                            echo '<a class="btn btn-primary" href="accept_application.php?id=' . $row['applicationID'] . '" style="margin-left: 10px;">Accept</a>';
                        ?>
                        </div>
                    <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    
    <footer>
        <div class="container">
            <a href="https://gabipruteanu.me"><h4>Powered by SecuroServ</h4></a><br>
        </div>
        <div class="container footer_container">
            <div class="footer_1">
                <a href="../../index.php" class="footer_logo"><h4>PedaONLINE</h4></a>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam magnam architecto.
                </p>
            </div>
            <div class="footer_2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="../../indexx.php">Home</a></li>
                    <li><a href="view_applications.php">Applications</a></li>
                    <li><a href="view_allteachers.php">All Teachers</a></li>
                    <li><a href="profile.php">Account</a></li>
                </ul>
            </div>

             <div class="footer_3">
                <h4>Privacy</h4>
                <ul class="privacy">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms and conditions</a></li>
                    <li><a href="">Refund Policy</a></li>
                </ul>
             </div>
             <div class="footer_4">
                <h4>Contact Us</h4>
                <div>
                    <p>0773376359</p>
                    <p>luanamilitaru.lulu@gmail.com</p>
                </div>

                <ul class="footer_socials">
                    <li>
                        <a href=""><i class="uil uil-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="uil uil-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="uil uil-linkedin-alt"></i></a>
                    </li>
                </ul>
             </div>
        </div>
        <div class="footer_copyright">
            <small>Copyright &copy;PedaONLINE</small>
         </div>
     </footer>




     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../../main/main.js"></script>

    
</body>
</html>
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
    <title>Courses</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="../../css/profile.css">
    <style>
        .courses{
            margin-top: 1rem;
        }
    </style>


    <style>
        body{ background-image: url("../../images/bg-texture.png")}
    </style>
</head>
<body>
      <!-- aici e simplu de comentat, navbar -->
      <nav>
        <div class="container nav_container">
            <a href="../../index.php"><h4>PedaONLINE</h4></a>
            <ul class="nav_menu">
                <li><a href="view_applications.php">Teachers Applications</a></li>
                <li><a href="view_allteachers.php">Teachers</a></li>
                <li><a href="../../php/logout.php">ADMIN(logout)</a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h1>Profile info</h1>
                <img src="../../images/about achievements.svg">
            </div>
            <div class="categories_right">
                <article class="category">
                    <h5>id: <?php echo $_SESSION['userID'] ?></h5>
                    <h5>Name: <?php echo $_SESSION['fullName'] ?></h5> 
                    <h5>Email: <?php echo $_SESSION['email'] ?></h5>
                    <h5>Role: <?php echo $_SESSION['role'] ?></h5>
                    <h5>Subscription Pack: <?php echo $_SESSION['subscription'] ?></h5>
                </article>
              
            </div>
        </div>
    </section>

    
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
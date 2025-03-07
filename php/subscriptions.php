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
    <title>About</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/subscriptions.css">


    <style>
        body{ background-image: url("../images/bg-texture.png")}
    </style>
</head>
<body>

    <!-- aici e simplu de comentat, navbar -->
    <nav>
        <div class="container nav_container">
            <a href="indexx.php"><h4>PedaONLINE</h4></a>
            <ul class="nav_menu">
                <li><a href="indexx.php">Home</a></li>
                <li><a href="subscriptions.php">About</a></li>
                <li><a href="home.php">Courses</a></li>
                <li><a href="profile.php"><?php echo $_SESSION['fullName']; ?></a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>


    <section class="about_subscriptions">
        <div class="container about_subscriptions-container">
            <div class="about_subscriptions_left">
                <img src="../images/contact.svg">
            </div>
            <div class="about_subscriptions-right">
                <h1>Subscription Packs</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus officia eaque ratione?</p>
                <div class="subscriptions_cards">
                    <a href="upgrade_subscription.php?subscription=GoodieBox">
                    <article class="subscription_card">
                        <span class="subscription_icon">
                            <i class="uil uil-calendar-alt"></i>
                        </span>
                        <h3>0,99€</h3>
                        <p>GoodieBox</p>
                        <h6>per Week</h6>
                    </article>
                    </a>

                    <a href="upgrade_subscription.php?subscription=Perky">
                    <article class="subscription_card">
                        <span class="subscription_icon">
                            <i class="uil uil-calendar-alt"></i>
                        </span>
                        <h3>2,99€</h3>
                        <p>Perky</p>
                        <h6>per Month</h6>
                    </article>
                    </a>
                    <a href="upgrade_subscription.php?subscription=All Accessby">
                    <article class="subscription_card">
                        <span class="subscription_icon">
                            <i class="uil uil-calendar-alt"></i>
                        </span>
                        <h3>9,99€</h3>
                        <p>All Accessby</p>
                        <h6>per Year</h6>
                    </article>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="team">
        <h2>Meet Our Team</h2>
        <div class="container team_container">
            <article class="team_member">
                <div class="team_member-image">
                    <img src="">
                </div>
                <div class="team_member-info">
                    <h4>Luana Militaru</h4>
                    <p>Smechera pe cartier</p>
                </div>
                <div class="team_member-socials">
                    <a href=""><i class="uil uil-instagram"></i></a>
                    <a href=""><i class="uil uil-facebook-f"></i></a>
                    <a href=""><i class="uil uil-linkedin-alt"></i></a>
                </div>
            </article>
            <article class="team_member">
                <div class="team_member-image">
                    <img src="">
                </div>
                <div class="team_member-info">
                    <h4>Bianca Tudor</h4>
                    <p>Smechera pe cartier</p>
                </div>
                <div class="team_member-socials">
                    <a href=""><i class="uil uil-instagram"></i></a>
                    <a href=""><i class="uil uil-facebook-f"></i></a>
                    <a href=""><i class="uil uil-linkedin-alt"></i></a>
                </div>
            </article>
            <article class="team_member">
                <div class="team_member-image">
                    <img src="">
                </div>
                <div class="team_member-info">
                    <h4>Stefania Croitoru</h4>
                    <p>Smechera pe cartier</p>
                </div>
                <div class="team_member-socials">
                    <a href=""><i class="uil uil-instagram"></i></a>
                    <a href=""><i class="uil uil-facebook-f"></i></a>
                    <a href=""><i class="uil uil-linkedin-alt"></i></a>
                </div>
            </article>
            <article class="team_member">
                <div class="team_member-image">
                    <img src="">
                </div>
                <div class="team_member-info">
                    <h4>Denisa Dudui</h4>
                    <p>Smechera pe cartier</p>
                </div>
                <div class="team_member-socials">
                    <a href=""><i class="uil uil-instagram"></i></a>
                    <a href=""><i class="uil uil-facebook-f"></i></a>
                    <a href=""><i class="uil uil-linkedin-alt"></i></a>
                </div>
            </article>

        </div>
    </section>

    <footer>
        <div class="container footer_container">
            <div class="footer_1">
                <a href="index.html" class="footer_logo"><h4>PedaONLINE</h4></a>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam magnam architecto.
                </p>
            </div>
            <div class="footer_2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="subscriptions.html">About</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="login.html">Log In</a></li>
                </ul>
            </div>

             <div class="footer_3">
                <h4>Privacy</h4>
                <ul class="privacy">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms and conditions</a></li>
                    <li><a href="../images/easteregg.jpg">Refund Policy</a></li>
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
    <script src="../main/main.js"></script>
    <script>
        var swiper=new Swiper(".mySwiper",{
            slidesPerView: 1,
            spaceBetween: 30,
            pagination:{
                el:".swiper-pagination",clickable:true,
            },
            breakpoints:{
                600:{
                    slidesPerView: 2
                }
            }
        });
    </script>
    
</body>
</html>
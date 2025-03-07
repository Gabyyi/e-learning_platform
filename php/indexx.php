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
    <title>HomePage</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../css/style.css">


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

    <!-- header -->
    <header>
        <div class="container header_container">
            <div class="header_left">
                <h1>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ipsa vero qui.
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio maiores quia ipsam voluptas.</p>
                <a href="home.php" class="btn btn-primary">Get Started!</a>
            </div>
            <div class="header_right">
                <div class="header_right-image">
                    <img src="../images/about achievements.svg">
                </div>
            </div>
        </div>
    </header>
<!--categorii, momentan sunt toate iconitele bitcoin :))))-->
    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h1>Categories</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id eius, similique dolorem sit molestiae ab aliquid illum consequuntur corporis eveniet.
                </p>
                <a href="home.php" class="btn btn-primary">Learn more</a>
            </div>
            <div class="categories_right">
                <article class="category">
                    <span class="category_icon"><i class="uil uil-visual-studio"></i></span>
                    <h5>Introduction to Programming</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-database"></i></span>
                    <h5>Data Science Bootcamp</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-laptop"></i></span>
                    <h5>Web Development</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-pen"></i></span>
                    <h5>Creative Writing</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-video"></i></span>
                    <h5>Photography Basics</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>
                <article class="category">
                    <span class="category_icon"><i class="uil uil-calculator-alt"></i></span>
                    <h5>Science</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, molestiae!</p>
                </article>
            </div>
        </div>
    </section>

<!--cursui idk-->

    <section class="courses">
        <h2>Our Popular Courses</h2>
        <div class="container courses_container">
            <article class="course">
                <div class="course_image">
                    <img src="../images/course1.jpg">
                </div>
               <div class="course_info">
                <h4>Lorem, ipsum dolor.</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates dignissimos vero earum omnis corporis mollitia.</p>
                <a href="home.php" class="btn btn-primary">Learn More</a>
               </div>
            </article>

            <article class="course">
                <div class="course_image">
                    <img src="../images/course2.jpg">
                </div>
               <div class="course_info">
                <h4>Lorem, ipsum dolor.</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates dignissimos vero earum omnis corporis mollitia.</p>
                <a href="home.php" class="btn btn-primary">Learn More</a>
               </div>
            </article>

            <article class="course">
                <div class="course_image">
                    <img src="../images/course3.jpg">
                </div>
               <div class="course_info">
                <h4>Lorem, ipsum dolor.</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates dignissimos vero earum omnis corporis mollitia.</p>
                <a href="home.php" class="btn btn-primary">Learn More</a>
               </div>
            </article>
        </div>
    </section>
<!--am si uitat cum dau comentarii in html, forum boss-->
    <section class="forums">
        <h2>Discuss with other people on forum</h2>
        <div class="container forums_container">
            <?php
                $database_query = "SELECT * FROM proiect_baza_de_date.forumpost ORDER BY postID DESC";
                mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                $result=mysqli_query($database_connection, $database_query);
                $forum = [];
                while ($row = $result->fetch_assoc()) {
                    $forum[] = $row;
                }
                $forum = array_slice($forum, -6);
            ?>
            <article class="forum">
                <div class="forum_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <?php
                        $database_query = "SELECT fullName FROM proiect_baza_de_date.users WHERE userID = '".$forum[0]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                    ?>
                    <h4><?php echo htmlspecialchars($fullName); ?></h4>
                    <p>
                        <?php echo htmlspecialchars($forum[0]['postContent']); ?>
                    </p>
                </div>
            </article>
            <article class="forum">
                <div class="forum_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <?php
                        $database_query = "SELECT fullName FROM proiect_baza_de_date.users WHERE userID = '".$forum[1]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                    ?>
                    <h4><?php echo htmlspecialchars($fullName); ?></h4>
                    <p>
                        <?php echo htmlspecialchars($forum[1]['postContent']); ?>
                    </p>
                </div>
            </article>
            <article class="forum">
                <div class="forum_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <?php
                        $database_query = "SELECT fullName FROM proiect_baza_de_date.users WHERE userID = '".$forum[2]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                    ?>
                    <h4><?php echo htmlspecialchars($fullName); ?></h4>
                    <p>
                        <?php echo htmlspecialchars($forum[2]['postContent']); ?>
                    </p>
                </div>
            </article>
            <article class="forum ">
                <div class="forum_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <?php
                        $database_query = "SELECT fullName FROM proiect_baza_de_date.users WHERE userID = '".$forum[3]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                    ?>
                    <h4><?php echo htmlspecialchars($fullName); ?></h4>
                    <p>
                        <?php echo htmlspecialchars($forum[3]['postContent']); ?>
                    </p>
                </div>
            </article>
        </div>
    </section>
    <!-- testimoniale, asa mai fancy -->
     <section class="container testimonials_container mySwiper">
        <h2>Students' Reviews</h2>
        <div class="swiper-wrapper">
            <?php
                $database_query = "SELECT * FROM proiect_baza_de_date.review WHERE rating=5 ORDER BY reviewID DESC";
                mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                $result=mysqli_query($database_connection, $database_query);
                $reviews = [];
                while ($row = $result->fetch_assoc()) {
                    $reviews[] = $row;
                }
                $reviews = array_slice($reviews, -6);
            ?>
            <article class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="../images/IMG_8023.PNG">
                </div>
                <div class="testimonial_info">
                    <?php 
                        $database_query = "SELECT fullName, role FROM proiect_baza_de_date.users WHERE userID = '".$reviews[0]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                        $role = $user['role'];

                        $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = '".$reviews[0]['courseID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $course = $result->fetch_assoc();
                        $courseName = $course['pedagogyType'];
                    ?>
                    <h5><?php echo htmlspecialchars($fullName); ?></h5>
                    <small><?php echo htmlspecialchars($role);?></small>
                </div>
                <div class="testimonial_body">
                    <p>
                        <?php echo $courseName."<br>".htmlspecialchars($reviews[0]['comment']);?>
                    </p>
                </div>
            </article>

            <article class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="../images/IMG_8023.PNG">
                </div>
                <div class="testimonial_info">
                    <?php 
                        $database_query = "SELECT fullName, role FROM proiect_baza_de_date.users WHERE userID = '".$reviews[1]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                        $role = $user['role'];

                        $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = '".$reviews[1]['courseID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $course = $result->fetch_assoc();
                        $courseName = $course['pedagogyType'];
                    ?>
                    <h5><?php echo htmlspecialchars($fullName); ?></h5>
                    <small><?php echo htmlspecialchars($role);?></small>
                </div>
                <div class="testimonial_body">
                    <p>
                        <?php echo $courseName."<br>".htmlspecialchars($reviews[1]['comment']);?>
                    </p>
                </div>
            </article>

            <article class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="../images/IMG_8023.PNG">
                </div>
                <div class="testimonial_info">
                    <?php 
                        $database_query = "SELECT fullName, role FROM proiect_baza_de_date.users WHERE userID = '".$reviews[2]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                        $role = $user['role'];

                        $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = '".$reviews[2]['courseID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $course = $result->fetch_assoc();
                        $courseName = $course['pedagogyType'];
                    ?>
                    <h5><?php echo htmlspecialchars($fullName); ?></h5>
                    <small><?php echo htmlspecialchars($role);?></small>
                </div>
                <div class="testimonial_body">
                    <p>
                        <?php echo $courseName."<br>".htmlspecialchars($reviews[2]['comment']);?>
                    </p>
                </div>
            </article>

            <article class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="../images/IMG_8023.PNG">
                </div>
                <div class="testimonial_info">
                    <?php 
                        $database_query = "SELECT fullName, role FROM proiect_baza_de_date.users WHERE userID = '".$reviews[3]['userID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $user = $result->fetch_assoc();
                        $fullName = $user['fullName'];
                        $role = $user['role'];

                        $database_query = "SELECT pedagogyType FROM proiect_baza_de_date.pedagogies WHERE pedagogyID = '".$reviews[3]['courseID']."'";
                        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
                        $result = mysqli_query($database_connection, $database_query);
                        $course = $result->fetch_assoc();
                        $courseName = $course['pedagogyType'];
                    ?>
                    <h5><?php echo htmlspecialchars($fullName); ?></h5>
                    <small><?php echo htmlspecialchars($role);?></small>
                </div>
                <div class="testimonial_body">
                    <p>
                        <?php echo $courseName."<br>".htmlspecialchars($reviews[3]['comment']);?>
                    </p>
                </div>
            </article>
        </div>
        <div class="swiper-pagination"></div>
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
                    <li><a href="login.html">Account</a></li>
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
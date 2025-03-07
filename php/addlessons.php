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

    <link rel="stylesheet" href="../css/home.css">
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
    <!-- Navbar -->
    <nav>
        <div class="container nav_container">
            <a href="indexx.php"><h4>PedaONLINE</h4></a>
            <ul class="nav_menu">
                <li><a href="indexx.php">Home</a></li>
                <li><a href="subscriptions.php">About</a></li>
                <li><a href="home_instructor.php">Courses</a></li>
                <li><a href="profile.php"><?php echo $_SESSION['fullName'] ?></a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
    <?php
        $submission_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $submission_ID = isset($_GET['ID']) ? (int)$_GET['ID'] : 0;
    ?>
    <div class="modal" id="cardModal">
        <div class="modal-content">
            <p>Add a new lesson</p>
            <form action="process_lessons.php" method="POST">
                    <input type="hidden" name="submission_id" value="<?php echo $submission_id; ?>">
                    <input type="hidden" name="submission_ID" value="<?php echo $submission_ID; ?>">
                    <label for="pdfTitle">Title</label>
                    <input type="text" name="title" id="pdfTitle" required>
                    <label for="pdfFile">Duration</label>
                    <input type="text" name="duration" id="pdfFile" required>
                    
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" onclick="closePopup()" class="btn btn-primary">Cancel</button>
            </form>

        </div>
    </div>
    

    
    <?php
        $submission_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $submission_ID = isset($_GET['ID']) ? (int)$_GET['ID'] : 0;


        $database_query = "SELECT * FROM proiect_baza_de_date.lessons WHERE pedagogyID = '$submission_id' AND instructorID = '$submission_ID'";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
        $result=mysqli_query($database_connection, $database_query);
    ?>
    <div class="courses">
        <div class="container">
            <h1>Lessons</h1>
        </div>

        <!-- Cards Container -->
        <div class="container courses_container">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <a href="materials.php?id=<?php echo $row['lessonID']; ?>">
                        <div class="course course_info" id="addCard">
                            <h3><?php echo htmlspecialchars($row['lessonTitle']); ?></h3>
                            <p><?php echo htmlspecialchars($row['duration']); ?></p>
                        
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
            
            <div class="course" id="addCard">
                <div class="course_info">
                    <p>Add courses by pressing "+" button</p>
                    <button  onclick="showPopup()" class="btn btn-primary"><i class="uil uil-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
 <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->





    <footer>
        <div class="container footer_container">
            <div class="footer_1">
                <a href="indexx.php" class="footer_logo"><h4>PedaONLINE</h4></a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam magnam architecto.</p>
            </div>
            <div class="footer_2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="indexx.php">Home</a></li>
                    <li><a href="subscriptions.php">About</a></li>
                    <li><a href="home.php">Courses</a></li>
                    <li><a href="profile.php">Account</a></li>
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
                    <li><a href=""><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href=""><i class="uil uil-instagram-alt"></i></a></li>
                    <li><a href=""><i class="uil uil-linkedin-alt"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer_copyright">
            <small>Copyright &copy;PedaONLINE</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../main/main.js"></script>

</body>
</html>

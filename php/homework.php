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

    <link rel="stylesheet" href="../css/newfile.css">
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
            <a href="indexx.php"><h4>PedaONLINE</h4></a>
            <ul class="nav_menu">
                <li><a href="indexx.php">Home</a></li>
                <li><a href="subscriptions.php">About</a></li>
                <li><a href="home.php">Courses</a></li>
                <li><a href="profile.php"><?php echo $_SESSION['fullName'] ?></a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <div class="container courses_container">
       <article class="course">
        <div class="course_info">
            <?php 
            
            $submission_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $submission_ID = isset($_GET['ID']) ? (int)$_GET['ID'] : 0;
            // echo $submission_ID;

            $database_query = "SELECT * FROM proiect_baza_de_date.assessments WHERE assessmentID = '$submission_id'";
            mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
            $result=mysqli_query($database_connection, $database_query);
            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <?php if (!empty($row['assessmentURL'])): ?>
                        <a href="<?php echo htmlspecialchars($row['assessmentURL']); ?>" download><?php echo htmlspecialchars($row['assessmentURL']); ?></a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            
            <form action="process_homework.php" method="POST" enctype="multipart/form-data">
                <div class="upload-area" id="upload-area">
                    <p>Drag and drop files here, or click to browse</p>
                    <input type="file" name="assignment" id="file-upload" multiple>
                </div>
                <input type="hidden" name="submission_id" value="<?php echo $submission_id; ?>">
                <input type="hidden" name="submission_ID" value="<?php echo $submission_ID; ?>">
                <div style="margin-top: 20px;">
                    <button type="submit" id="upload-button" class="btn btn-primary">Upload Files</button>
                </div>
            </form>
    
        </div>
        <ul id="file-list">
            <?php
            $files_query = "SELECT * FROM proiect_baza_de_date.student_assessment WHERE userID='$_SESSION[userID]' AND assessmentID = '$submission_id' ORDER BY studentAssessmentID DESC LIMIT 1";
            $files_result = mysqli_query($database_connection, $files_query);

            if ($files_result && $files_result->num_rows > 0) {
                while ($file = $files_result->fetch_assoc()) {
                    echo '<li>';
                    echo '<a href="' . htmlspecialchars($file['assignmentURL']) . '" download>' . htmlspecialchars($file['assignmentURL']) . '</a>';
                    if (!empty($file['assignmentURL'])) {
                        echo '<a class="btn btn-primary" href="remove_submission.php?id=' . $submission_id . '" style="margin-left: 10px;">Remove</a>';
                    }
                    echo '</li>';
                }
            } 
            // else {
                // echo '<li>No files uploaded yet.</li>';
            // }
            ?>
            
        </ul>
       </article>
    </div>
    <footer>
        <div class="container footer_container">
            <div class="footer_1">
                <a href="indexx.php" class="footer_logo"><h4>PedaONLINE</h4></a>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam magnam architecto.
                </p>
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

    
</body>
</html>
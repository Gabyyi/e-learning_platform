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


    <div class="modal" id="cardModal">
        <div class="modal-content">
            <p>What courses are you interested in?</p>
            <form action="process.php" method="POST">
                <?php
                    $pedagogy_query = "SELECT * FROM proiect_baza_de_date.pedagogies";
                    $pedagogy_result = mysqli_query($database_connection, $pedagogy_query);
                ?>
                
                <label for="pedagogy">Subjects:</label>
                <select id="pedagogy" name="pedagogy" required onchange="updateTeachers()">
                    <option value="">Select a subject</option>
                    <?php while ($pedagogy_row = mysqli_fetch_assoc($pedagogy_result)) : ?>
                        <option value="<?php echo $pedagogy_row['pedagogyID']; ?>"><?php echo $pedagogy_row['pedagogyType']; ?></option>
                    <?php endwhile; ?>
                </select>
                    
                <label for="teacher">Teacher:</label>
                <select id="teacher" name="teacher" required>
                    <option value="">Select a teacher</option>
                </select>
                    
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" onclick="closePopup()" class="btn btn-primary">Cancel</button>
            </form>

            <script>
                function updateTeachers() {
                    const pedagogyID = document.getElementById('pedagogy').value;
                    const teacherSelect = document.getElementById('teacher');
                
                    teacherSelect.innerHTML = '<option value="">Select a teacher</option>';
                
                    if (pedagogyID) {
                        fetch(`fetch_teachers.php?pedagogyID=${pedagogyID}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(teacher => {
                                    const option = document.createElement('option');
                                    option.value = teacher.fullName;
                                    option.textContent = teacher.fullName;
                                    teacherSelect.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error fetching teachers:', error));
                    }
                }
            </script>

        </div>
    </div>
    

    
    <?php 
        $database_query = "SELECT * FROM proiect_baza_de_date.courses WHERE userID = '$_SESSION[userID]'";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");
        $result=mysqli_query($database_connection, $database_query);
    ?>
    <div class="courses">
        <div class="container">
            <h1>Your courses</h1>
        </div>

        <!-- Cards Container -->
        <div class="container courses_container">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <a href="assessments.php?id=<?php echo $row['pedagogyID']; ?>&ID=<?php echo $row['instructorID']; ?>">
                        <div class="course course_info" id="addCard">
                            <h3><?php echo htmlspecialchars($row['courseName']); ?></h3>
                            <p><?php echo htmlspecialchars($row['fullName']); ?></p>
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
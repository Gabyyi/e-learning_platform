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

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../css/review.css">


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
    <section class="wrapper">
		<h3>Leave a review</h3>
        <?php $submission_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;?>
		<form action="process_review.php?id=<?php echo $submission_id; ?>" method="POST">
			<div class="rating">
				<input type="number" name="rating" hidden>
				<i class='bx bx-star star' style="--i: 0;"></i>
				<i class='bx bx-star star' style="--i: 1;"></i>
				<i class='bx bx-star star' style="--i: 2;"></i>
				<i class='bx bx-star star' style="--i: 3;"></i>
				<i class='bx bx-star star' style="--i: 4;"></i>
			</div>
			<textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
			<div class="btn-group">
				<button type="submit" class="btn submit">Submit</button>
				<a href="profile.php" class="btn cancel">Cancel</a>
			</div>
		</form>
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
    <script>
        //pentru stelute la review
        const allStar = document.querySelectorAll('.rating .star')
        const ratingValue = document.querySelector('.rating input')

        allStar.forEach((item, idx)=> {
        	item.addEventListener('click', function () {
        		let click = 0
        		ratingValue.value = idx + 1
            
        		allStar.forEach(i=> {
        			i.classList.replace('bxs-star', 'bx-star')
        			i.classList.remove('active')
        		})
        		for(let i=0; i<allStar.length; i++) {
        			if(i <= idx) {
        				allStar[i].classList.replace('bx-star', 'bxs-star')
        				allStar[i].classList.add('active')
        			} else {
        				allStar[i].style.setProperty('--i', click)
        				click++
        			}
        		}
        	})
        })
    </script>
    
</body>
</html>
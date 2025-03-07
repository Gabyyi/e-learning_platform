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
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <style>
        body{ background-image: url("/images/bg-texture.png")}
    </style>
</head>
<body>
    <section class="sign-in">
        <article class="sign-in_details">
            <h1>Apply for teacher role at PedaONLINE</h1>
            <p>Fill the form below to create your account</p>
            <form class="sign-in_form" action="../admin/admin/applications.php" method="POST">
                <div class="form_control">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your full name">
                </div>
                <div class="form_control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form_control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                </div>
                <div class="form_control">
                    <label for="cpassword"> Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password">
                </div>
                <div class="form_control">
                    <?php
                        $pedagogy_query = "SELECT * FROM proiect_baza_de_date.pedagogies";
                        $pedagogy_result = mysqli_query($database_connection, $pedagogy_query);
                    ?>
                    <label for="subject"> Subject you are teaching</label>
                    <select id="pedagogy" name="pedagogy" size="1">
                    <option value="">Select a subject</option>
                    <?php while ($pedagogy_row = mysqli_fetch_assoc($pedagogy_result)) : ?>
                        <option value="<?php echo $pedagogy_row['pedagogyID']; ?>"><?php echo $pedagogy_row['pedagogyType']; ?></option>
                    <?php endwhile; ?>
                    </select>
                </div>
                <div class="form_control">
                    <label for="school">Short description</label>
                    <input type="text" name="bio" id="bio" placeholder="A short description about yourself">
                </div>
                <button class="btn primary" type="submit">Sign up</button>
            </form>
            <small class="next_page"><a href="../signup.html">I am a student</a></small>
        
        </article>
        <article class="sign-in_logo">
            <div>
                <img src="../images/header.svg">
            </div>
        </article>
    </section>
</body>
</html>
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'my_app_db');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

if (isset($_POST['update_btn'])) {
    $username = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE users SET name='$name', email='$email' WHERE username='$username'";
    mysqli_query($db, $query);
    $_SESSION['message'] = "Profile updated";
    header('location: profile.php');
    exit();
}

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            .bt{
                color: #0f0101;
                margin-bottom:10px ;
                font-weight: 600;
            }
        </style>
</head>
<body>
<section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/demo-logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#top">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">TESTIMONIALS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">CONTACT</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

    </section>
   

       <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wave">
                    <p class="promo-title">Profile EDITS</p>
                    <?php if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    } ?>

    <form method="POST" action="profile.php">
        <label for="name" class="bt" >Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <br>
        <label for="email" class="bt" >Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>
        <button type="submit" name="update_btn" class="bt" >Update Profile</button>
    </form>

    <button class="btn btn-danger "><a href="logout.php" class="bt">Logout</a></button>
            </div>
            <div class="col-md-6 text-center">
                    <img src="images/home2.png" class="img-fluid" alt="">


                </div>
        </div>
 
    </section>
  

    <!-- footer -->

    <!-- CONTACT -->
    <section id="social-media">
        <div class="container text-center">
            <p>FIND US ON SOCIAL MEDIA</p>

            <div class="social-icons">
                <a href="#"><img src="images/facebook-icon.png"></a>
                <a href="#"><img src="images/instagram-icon.png"></a>
                <a href="#"><img src="images/twitter-icon.png"></a>
                <a href="#"><img src="images/whatsapp-icon.png"></a>
                <a href="#"><img src="images/linkedin-icon.png"></a>
                <a href="#"><img src="images/snapchat-icon.png"></a>
            </div>
        </div>
    </section>
    <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                    <img src="images/demo-logo.png" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nemo optio, repellat nostrum
                        nam enim laudantium ad eum cum officia. Hic adipisci error inventore dolorum eligendi minus at
                        numquam doloribus!</p>

                </div>
                <div class="col-md-4 footer-box">
                    <p><b>CONTACT US</b></p>
                    <p><i class="fa fa-map-marker" ></i>Computer Manufacturing company , Banaglore</p>
                    <p><i class="fa fa-phone"></i>+1 0123456789</p>
                    <p><i class="fa fa-envelope-o"></i>xcv@gmail.com</p>

                </div>

            </div>

        </div>
    </section>
</body>
</html>

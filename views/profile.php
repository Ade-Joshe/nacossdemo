<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/profile.php'; ?>

<!DOCTYPE HTML>
<!--
	Nacoss by CSCGRoup 2
	Released for free under the MIT FREE LICENSE WARE
-->
<html>

<head>
    <title>The Official Website of NACOSS </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">

    <!-- Header -->
    <header id="header">
        <a class="logo" href="index.php"><img class='imageHeader' src="images/nat-logo.png"></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="#">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <!-- Heading -->
    <div id="heading">
        <h1>Member Profile</h1>
    </div>

    <!-- main body -->
    <div class="inner contenting">
        <center>
            <main style="text-align: left; overflow: -moz-hidden-unscrollable">
                <div class="rightHalf">
                    <div class="author">
                        <div class="image">
                            <img src="images/pic02.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <p class="credit"><strong>Name:</strong> Standley Charisma </p>
                <p class="credit"><strong>Department: </strong> Information Technology</p>
                <p class="credit"><strong>Phone Number:</strong> +234 812 129 1234 </p>
                <p class="credit"><strong>Contact Address:</strong> 24, Corel draw street opposite photoshop junction.
                </p>
                <p class="credit"><strong>Designation: </strong> Students </p>
                <div class="col-12 buttonDiv">
                    <ul class="actions">
                        <li><a href='editProfile.php'><input type="submit" value="Edit" class="default" /></a>
                        </li>
                    </ul>
                </div>
            </main>
        </center>
    </div>
    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <div class="content">
                <section>
                    <h4> Don't miss a thing </h4>
                    <ul class="plain">
                        <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                        <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                        <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                        <li><a href="#"><i class="icon fa-slack">&nbsp;</i>Slack</a></li>
                    </ul>
                </section>
            </div>
            <div class="copyright">
                <span> &copy; Nacoss, 2019 </span><a style="margin-left: 20px" href="about.php">About </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
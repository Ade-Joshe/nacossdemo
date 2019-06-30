<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/registration.php'; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Register - Official Website of NACOSS </title>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="#">Registration</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    </header>

    <!-- Heading -->
    <div id="heading">
        <img src="images/logo.png" class="bannerLogo" /><br />
        <h1>NACOSS</h1>
    </div>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <h3 style="text-align: center"><strong> New Member Registration</strong></h3>
                <form method="post" action="#">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <input type="text" name="name" id="name" value="" placeholder="Last Name (Surname)" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="name" id="name" value="" placeholder="First Names" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="name" id="name" value="" placeholder="Other Names" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="name" id="name" value="" placeholder="Phone Number" />
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" id="email" value="" placeholder="Email" />
                        </div>
                        <div class="col-12">
                            <input type="password" name="email" id="email" value="" placeholder="Password" />
                        </div>
                        <div class="col-12 buttonDiv">
                            <ul class="actions">
                                <li><a href='profile.php'><input type="submit" value="Register" class="primary" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
                <p style="text-align: center"> Already a member, <a href="login.php"> Login </a></p>
            </div>
        </div>
    </section>

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
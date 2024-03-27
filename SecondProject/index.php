<?php
session_start();
?>

<html>

  <head>
    <title> Home | CakeBytes Cafe' </title>
  </head>

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-REPLACE_WITH_INTEGRITY_ATTRIBUTE" crossorigin="anonymous" />

<body>
<div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CakeBytes Cafe'</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
      </ul>

      <?php if (isset($_SESSION['login_user1'])) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
          <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
          <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
        </ul>
      <?php } else if (isset($_SESSION['login_user2'])) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
          <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
              <?php if (isset($_SESSION["cart"])) {
                $count = count($_SESSION["cart"]);
                echo "($count)";
              } else {
                echo "(0)";
              } ?>
            </a></li>
          <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
        </ul>
      <?php } else { ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="customersignup.php">User Sign-up</a></li>
              <li><a href="managersignup.php">Manager Sign-up</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="customerlogin.php">User Login</a></li>
              <li><a href="managerlogin.php">Manager Login</a></li>
            </ul>
          </li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>

  
<div class="wide">
  <div class="col-xs-5 line"><hr></div>
  <div class="col-xs-2 logo"><img src="images/icn.png"/></div>
  <div class="col-xs-2 line"><hr><br><br></div>
  <br><br><br><br>
  <div class="tagline">
    <font color="wheat"><br><br><br><br><br>
      <p>
        <img src="images/bg4.png" height="380" width="800" alt="Image resize">
      </p>
    </font>
  </div>
</div>
<br>
<div class="orderblock" style="background-image: url('images/b5.png');">
<h2 >Food Can Buy Happiness...! Doubt ...? Click Below...!</h2>
  <center><a class="btn btn-success btn-lg" href="customerlogin.php" role="button">Order Now</a></center>
</div>
  
</body>
</html>
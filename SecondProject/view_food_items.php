<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>

  <head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Manager Login | CakeBytes Cafe' </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
  </head>



<body>


    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Dream Cafe'</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    		<a href="myrestaurant.php" class="list-group-item ">My Restaurant</a>
    		<a href="view_food_items.php" class="list-group-item active">View Food Items</a>
    		<a href="add_food_items.php" class="list-group-item ">Add Food Items</a>
    		<a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>
    		<a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>
        <a href="view_order_details.php" class="list-group-item ">View Order Details</a>
    	</div>
    </div>
    


    
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> YOUR FOOD ITEMS LIST </h3>


<?php




// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM food f WHERE f.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY F_ID";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>  </th>
        <th> Food ID </th>
        <th> Food Name </th>
        <th> Price </th>
        <th> Description </th>
        <th> Restaurant ID </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["F_ID"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["price"]; ?></td>
      <td><?php echo $row["description"]; ?></td>
      <td><?php echo $row["R_ID"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

  <?php } ?>

        </form>

        
        </div>
      
    </div>
</div>
<br>
<br>
<br>
<br>
  
  <!-- Footer -->

  <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span class="text-muted">© <?php echo date("Y"); ?> CakeBytes Cafe'</span>
        </div>
    </footer>

<!-- Add Bootstrap JavaScript and jQuery library references -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>
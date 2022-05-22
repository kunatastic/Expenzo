<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title tag -->
  <title>Expenzo | Sign Up Page</title>

  <!-- Font awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />

  <!-- Normalize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />

  <!-- Custom CSS -->
  <link href="../assets/css/custom-bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/main.css" rel="stylesheet" />
  <link href="../assets/css/sign-up.css" rel="stylesheet" />
</head>

<body>
  <!-- Main Navigation -->
  <nav class="main-nav" id="main-nav">
    <div class="content-wrapper-sm">
      <a href="../home" class="navbar-brand">Expenzo</a>
      <div id="menu-button">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
      <ul class="nav-links">
        <li><a href="../login/">Log In</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main header -->
  <header>
    <!-- First replaceble image -->
    <img class="img-absolute"
      src="https://raw.githubusercontent.com/Jesus-E-Rodriguez/cityscapes-landing-page/master/img/city.png"
      alt="City 1" />
    <div class="wrapper astonish animated fadeInDown">
      <div class="rpage">

        <div class="form">
          <form class="login-form" method="POST">
            <input type="text" name="grp_name" placeholder="group name" />
            <input type="text" name="desc" placeholder="description" />
            <input type="text" name="num" placeholder="number of members" />
            <input type="text" name="mem" placeholder="member names seperated by comma" />
            <input type="password" name="password" placeholder="password" />
            <button name="submit">Register</button>
            <p class="message">Already registered? <a href="../login/">Sign In</a></p>
          </form>
        </div>
      </div>
    </div>
    </div>
  </header>
  <?php
  if (isset($_POST['submit'])) {
    $user = $_POST['grp_name'];
    $pwd = $_POST['password'];
    $desc = $_POST['desc'];
    $num = $_POST['num'];
    $mem = $_POST['mem'];

    $query = "INSERT INTO `group_details` VALUES ('$user','$desc','$num','$mem','$pwd');";
    //$data=mysqli_query($conn,$query);
    //$total=mysqli_num_rows($data);
    mysqli_query($conn, $query);
    echo ("<script>alert('Group Registered Successfully');</script>");
    header("location:../login/");
  }
  ?>
</body>

</html>
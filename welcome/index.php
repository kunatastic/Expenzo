<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

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
  <link href="../assets/css/welcome.css" rel="stylesheet" />
</head>

<body>
  <!-- Main Navigation -->
  <nav class="main-nav" id="main-nav">
    <div class="content-wrapper-sm">
      <a href="../welcome" class="navbar-brand">Expenzo</a>
      <div id="menu-button">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
      <ul class="nav-links">
        <li><a>Group Name: <?php echo ($_SESSION['grp_name']) ?></a></li>
        <li><a href="../logout/">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- <section class="hero">
    <header class="hero-header">
      <h1 class="hero-title">Hey there</h1>
      <h1 class="hero-subtitle">
        Welcome to Exprenzo. We are glad to have you here. Just to get started there are 3 main
        buttons more reading at the bottom of the page.
      </h1>
    </header>
  </section> -->

  <!-- Main header -->
  <header>
    <!-- First replaceble image -->
    <img class="img-absolute"
      src="https://raw.githubusercontent.com/Jesus-E-Rodriguez/cityscapes-landing-page/master/img/city.png"
      alt="City 1" />
    <div class="wrapper astonish animated fadeInDown">
      <div class=""></div>
      <h1><strong>Expe</strong>nzo</h1>
      <h2 class="header__title">Hey There</h2>
      <h2 class="header__subtitle">
        Welcome to Exprenzo. We are glad to have you here. Just to get started there are 3 main
        buttons more reading at the bottom of the page.
      </h2>
      <section class="hero-section">
        <div class="grid-card">
          <a href="../add-expense/">
            <div class="card">
              <div class="content__header">Add new expense</div>
              <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat nulla quisquam
                voluptate. Eius repellendus nam nesciunt expedita laudantium voluptatum quam?</div>
            </div>
          </a>
          <a href="../view-expense/">
            <div class="card">
              <div class="content__header">View all expense</div>
              <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat nulla quisquam
                voluptate. Eius repellendus nam nesciunt expedita laudantium voluptatum quam?</div>
            </div>
          </a>
          <a href="../expense-share/">
            <div class="card">
              <div class="content__header">View expense share</div>
              <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat nulla quisquam
                voluptate. Eius repellendus nam nesciunt expedita laudantium voluptatum quam?</div>
            </div>
          </a>
        </div>
      </section>
  </header>
</body>

</html>
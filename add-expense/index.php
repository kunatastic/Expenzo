<?php
session_start();
include("../connection.php");

if (!isset($_SESSION['grp_name'])) {
  header("Location: ../login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
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
      <a href="../welcome" class="navbar-brand">Expenzo</a>
      <div id="menu-button">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
      <ul class="nav-links">
        <li><a>Group Name: <?php echo ($_SESSION['grp_name']) ?></a></li>
        <li><a href="../welcome/">Home</a></li>
        <li><a href="../logout/">Logout</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main header -->
  <header>
    <!-- First replaceble image -->
    <img class="img-absolute"
      src="https://raw.githubusercontent.com/Jesus-E-Rodriguez/cityscapes-landing-page/master/img/city.png"
      alt="City 1" />
    <div class="content-wrapper-lg astonish animated">
      <section class="expense">
        <?php
        $user = $_SESSION['grp_name'];
        $query = "SELECT * FROM group_details WHERE grp_name='$user';";
        $data = mysqli_query($conn, $query);
        $res = mysqli_fetch_assoc($data);
        $num = $res['no_of_mem'];
        $mem = $res['mem_name'];
        $arr = explode(",", $mem);
        //print_r($arr);
        ?>

        <div class="form">
          <form class="expense-form" method="POST">
            <input type="text" name="description" id="description" placeholder="description" />
            <input type="text" name="amount" id="amount" placeholder="amount" required />
            <?php
            echo ("<select name='name' id='name'  required >");
            echo ("<option value=''>Expense Done by</option>");
            for ($i = 0; $i < $num; $i++) {
              echo ("<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>");
            }
            echo ("</select>");
            ?>
            <br />
            <br />
            <label for="members">Expense Shared By </label>
            <?php
            echo ("<br>");
            for ($i = 0; $i < $num; $i++) {
              echo ("<div><input type='checkbox' name=" . $i . "> &nbsp;" . $arr[$i] . "</div>");
            }
            ?>

            <br />
            <br />

            <button type="submit" name="submit" class="button">Submit</button>
          </form>
          <?php
          if (isset($_POST['submit'])) {
            $user = $_SESSION['grp_name'];
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $amt = $_POST['amount'];
            $mem = [];
            $count = 0;
            for ($i = 0; $i < $num; $i++) {
              if (isset($_POST[$i])) {
                $mem[$count] = $arr[$i];
                $count++;
              }
            }
            $samt = $amt / $count;
            for ($j = 0; $j < $count; $j++) {
              $query = "INSERT INTO `transaction`(`grp_name`, `name`, `exp_desc`, `amt_share`) VALUES ('$user','$mem[$j]','$desc','$samt');";
              mysqli_query($conn, $query);
            }
            $str = join(",", $mem);
            $query = "INSERT INTO `expense`(`grp_name`, `mem_exp_name`, `exp_desc`, `exp_amt`, `exp_split_num`, `mem_name`) VALUES ('$user','$name','$desc','$amt','$count','$str');";
            mysqli_query($conn, $query);
            //$data=mysqli_query($conn,$query);
            //$total=mysqli_num_rows($data);
            /*  mysqli_query($conn,$query);
        echo("<script>alert('Group Registered Successfully');</script>");
        header("location:Login.php");*/
          }
          ?>
        </div>
      </section>
    </div>
  </header>

</body>

</html>
<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html>

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

  <!-- Main header -->
  <header>
    <!-- First replaceble image -->
    <img class="img-absolute"
      src="https://raw.githubusercontent.com/Jesus-E-Rodriguez/cityscapes-landing-page/master/img/city.png"
      alt="City 1" />
    <div class="content-wrapper-lg astonish animated">
      <div>
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
        <form method="POST">
          <label>View Expense for :</label>

          <?php
          echo ("<select name='name' id='name'  required >");
          echo ("<option value=''>---Choose the member---</option>");
          for ($i = 0; $i < $num; $i++) {
            echo ("<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>");
          }
          echo ("<option value='all'>---Overall Expense---</option>");
          echo ("</select>");
          ?>
          <input type="submit" name="submit" />
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $user = $_SESSION['grp_name'];
          $name = $_POST['name'];
          if ($name == "all") {
            $query = "Select * from expense where grp_name='$user';";
            $idata = mysqli_query($conn, $query);
            echo ("Total Expense of entire trip <br>");
            echo ('<table border="1" align="center" cellpadding="10" cellspacing="5">
            <tr><th>Sr.No.</th>
            <th>Expense Description</th>
            <th>Shared By</th>
            <th>Paid By</th>
            <th>Amount</th></tr>');
            $ct = 0;
            $sum = 0;
            while ($iresult = mysqli_fetch_assoc($idata)) {
              $ct++;
              $sum += $iresult['exp_amt'];
              echo "<tr><td>" . $ct . "</td><td>" . $iresult['exp_desc'] . "</td><td>" . $iresult['mem_name'] . "</td><td>" . $iresult['mem_exp_name'] . "</td><td>" . $iresult['exp_amt'] . "</td></tr>";
            }
            echo "<tr><td style='text-align:center' colspan='4'>" . "<b>Total</b></td><td><b>" . $sum . "</b></td></tr>";
            echo ("</table>");
          } else {
            $query = "Select * from transaction where grp_name='$user' and name='$name';";
            $idata = mysqli_query($conn, $query);
            echo ("Total Expense of " . $name . "<br>");
            echo ('<table border="1" align="center" cellpadding="10" cellspacing="5">
            <tr><th>Sr.No.</th>
            <th>Expense Description</th>
            <th>Amount</th></tr>');
            $ct = 0;
            $sum = 0;
            while ($iresult = mysqli_fetch_assoc($idata)) {
              $ct++;
              $sum += $iresult['amt_share'];
              echo "<tr><td>" . $ct . "</td><td>" . $iresult['exp_desc'] . "</td><td>" . $iresult['amt_share'] . "</td></tr>";
            }
            echo "<tr><td style='text-align:center' colspan='2'>" . "<b>Total</b></td><td><b>" . $sum . "</b></td></tr>";
            echo ("</table>");
          }
        }


        ?>

      </div>
    </div>
  </header>
</body>

</html>
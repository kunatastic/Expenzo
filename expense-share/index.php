<?php
session_start();
include("../connection.php");

if (!isset($_SESSION['grp_name'])) {
  header("Location: ../login");
}
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


        <?php
        $total_spent = [];
        for ($i = 0; $i < $num; $i++) {
          $query = "Select * from expense where grp_name='$user' and mem_exp_name='$arr[$i]';";
          $idata = mysqli_query($conn, $query);
          $sum = 0;
          while ($iresult = mysqli_fetch_assoc($idata)) {
            $sum += $iresult['exp_amt'];
          }
          $total_spent[$i] = $sum;
        }

        ?>
        <?php
        $total_exp = [];
        for ($i = 0; $i < $num; $i++) {
          $query = "Select * from transaction where grp_name='$user' and name='$arr[$i]';";
          $idata = mysqli_query($conn, $query);
          $sum = 0;
          while ($iresult = mysqli_fetch_assoc($idata)) {
            $sum += $iresult['amt_share'];
          }
          $total_exp[$i] = $sum;
        }
        ?>
        <?php
        //  print_r($arr);
        //print_r($total_spent);
        //print_r($total_exp);
        echo ('<table border="1" align="center" cellpadding="10" cellspacing="5">
        <tr><th>Sr.No.</th>
        <th>Members</th>
        <th>Total_Expense</th>
        <th>Total_Spent</th>
        <th>Balance_Amount</th></tr>');
        for ($i = 0; $i < $num; $i++) {
          $val = ($total_exp[$i] - $total_spent[$i]);
          $x = $i + 1;
          echo "<tr><td>" . $x . "</td><td>" . $arr[$i] . "</td><td>" . $total_exp[$i] . "</td><td>" . $total_spent[$i] . "</td><td>" . $val . "</td></tr>";
        }
        echo ("</table>");
        ?>
        <p style="text-align:center"><b>Note: +ve sign indicates amount to be given and -ve sign indicates amount to be
            received</b></p>

      </div>
    </div>
  </header>
</body>

</html>
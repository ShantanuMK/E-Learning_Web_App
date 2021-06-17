<?php
  $conn=mysqli_connect("localhost","root","","school");
  session_start();

  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/styless.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<?php
$q = intval($_GET['q']);


$fid=$q;





$get=mysqli_query($conn,"SELECT * FROM subfiles where fid = '".$q."'");
$get1=mysqli_fetch_assoc($get);
echo '<form method="post" action="assignment.php"><input type="hidden" name="fid" value='.$get1["fid"].'><input type="submit" name="view" class="btn-link" value="Assignment File('.$get1['filename'].')"></form>';
echo "<br>Submission Date:".$get1['sdate'];

$sql="SELECT * FROM stufiles WHERE fid = '".$q."'";
$result = mysqli_query($conn,$sql);

echo '<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-20 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
              <form method="post" action="assignment.php">
						    <thead class="thead-primary">
						      <tr class="text-center">

								<th>Student</th>
								<th>File</th>
								<th>Date Submitted</th>
								</tr></thead><tbody>';
while($row = mysqli_fetch_array($result)) {
  $id=$row['sid'];
  $sn=mysqli_query($conn,"SELECT * FROM students where sid=$id");
  $sna=mysqli_fetch_assoc($sn);
  echo '<tr class="text-center">';
  echo "<td>" . $sna['sname'] . "</td>";
  echo '<td class="product-name"><input type="hidden" name="fid" value='.$q.'><input type="hidden" name="sid" value='.$row["sid"].'><input type="submit" name="view" class="btn-link" value="File ('.$row['sfilename'].')">
                    </td>';
  echo "<td>" . $row['subdate'] . "</td>";
  echo "</tr>";
}
echo "</tbody></form></table></div></div></div></div></section>";

?>
    

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>




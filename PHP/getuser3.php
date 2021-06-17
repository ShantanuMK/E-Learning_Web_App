
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
$con = mysqli_connect('localhost','root','','school');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$q = intval($_GET['q']);






$get=mysqli_query($con,"SELECT * FROM subfiles where fid = '".$q."'");
$get1=mysqli_fetch_assoc($get);
echo "Assignment name: ".$get1['ftname'];
echo "<br>Submission Date: ".$get1['sdate'];
echo '<form method="post" action="stuassign.php"><input type="hidden" name="fid" value='.$get1["fid"].'><input type="submit" name="view" class="btn-link" value="File('.$get1['filename'].')"></form>';

echo '        
      <form action="stuassign.php" method="post" class="billing-form" enctype="multipart/form-data">
          <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="Fees">Assignment file (Only in PDF format)</label>
                            <div>
                                <input type="hidden" name="size" value="10000">
                                  <div>
                                      <input type="file" name="file">
                                  </div>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-12"><input type="hidden" name="fid" value='.$get1["fid"].'>
                            <input type="submit" name="enter" value="Upload" class="btn btn-primary btn-lg px-5">
                            <a href="subwork.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                        </div>
                    </div>
                  </form>';
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




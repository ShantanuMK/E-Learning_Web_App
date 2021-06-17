<?php
  $conn=mysqli_connect("localhost","root","","school");
  session_start();
  $subid=$_SESSION['subid'];
  $sid=$_SESSION['sid'];

  if (isset($_POST['enter'])) {
    $fid=$_POST['fid'];
    $extension1 = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $file = 'stu_'.$sid.'_file_'.$fid.'.'.$extension1;
    $target1 = "files/".basename($file);

    if($extension1=='pdf')
        {

              if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                $msg = "File uploaded successfully";
              }else{
                $msg = "Failed to upload file";
              }

              $sq="INSERT INTO stufiles (fid,sid,sfilename) VALUES ($fid,$sid,'$file')";
              mysqli_query($conn, $sq);
              header("Location:subwork.php");
              
        }
    
  }

  if (isset($_POST['view'])) {
    $fid=$_POST['fid'];
      $select = "SELECT * FROM subfiles WHERE fid=$fid ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->filename;
        $path = 'files/';
        $file = $path.$pdf;
      }
      // Add header to load pdf file
      header('Content-type: application/pdf'); 
      header('Content-Disposition: inline; filename="' .$file. '"'); 
      header('Content-Transfer-Encoding: binary'); 
      header('Accept-Ranges: bytes'); 
      @readfile($file);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser3.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"> ‘Never let formal education get in the way of your learning.’ –Mark Twain</a> 
            
          </div>
          
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php" class="d-block">
              <img src="images/logo.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="about.php" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="teachers.php">Our Teachers</a></li>
                    <li><a href="about.php">Our School</a></li>
                  </ul>
                </li>
                <li>
                  <a href="courses.php" class="nav-link text-left">Courses</a>
                </li>
                <?php 
                if (isset($_SESSION['mid']) || isset($_SESSION['aid']) || isset($_SESSION['sid'])) {

                 if (isset($_SESSION['mid'])) 
                  {
                    $q11=$_SESSION['mid'];
                    $q12=mysqli_query($conn,"SELECT * FROM mentor where mid='$q11' ");
                    $q13=mysqli_fetch_array($q12);
                    $q14=$q13['mtearned'];
                    echo '<li class="nav-item"><a href="dash_mentor.php" class="nav-link">Dashboard</a></li>';
                    echo '<li class="nav-item"><a href="upload_course.php" class="nav-link">Upload Course</a></li>';
                    echo '<li class="nav-item"><a href="#" class="nav-link">Total Earned($'.$q14.')</a></li>';
                  }
                  elseif (isset($_SESSION['sid'])) 
                  {
                    
                    echo '<li class="nav-item"><a href="dash_student.php" class="nav-link">Dashboard</a></li>';
                    echo '<li class="nav-item"><a href="my_courses.php" class="nav-link">My Courses</a></li>';
                  }
                  elseif (isset($_SESSION['aid'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_admin.php" class="nav-link">Dashboard</a></li>';
                    $p1=mysqli_query($conn,"SELECT * FROM admin");
                    $p2=mysqli_fetch_assoc($p1);
                    echo '<li class="nav-item"><a href="" class="nav-link">Total Earned ($'.$p2["atearned"].')</a></li>';
                  }

                  if (isset($_SESSION['sname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['sname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['mname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['mname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['aname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['aname'].'</a></li>';
                  }
                  echo '<li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>';
                }
                else {
                       echo '<li class="has-children">
                          <a href="about.php" class="nav-link text-left">Students</a>
                          <ul class="dropdown">
                            <li><a href="login_student.php">Login</a></li>
                            <li><a href="register_student.php">Register</a></li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="about.html" class="nav-link text-left">Mentor</a>
                          <ul class="dropdown">
                            <li><a href="login_mentor.php">Login</a></li>
                            <li><a href="register_mentor.php">Register</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="login_admin.php" class="nav-link text-left">Admin</a>
                        </li>';
                      }   
            ?>
              </ul>                                                                                                             
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <pre>


    </pre>
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Welcome <?php echo $_SESSION['subid']; ?></h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 

    <div class="site-section">
        <div class="container">
            <div class="row">
              <div class="col-md-6 mb-4">
                 <p>
                  <form method="post" action="stuassign.php">
                            <input type="submit" name="exam" value="Exam" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="assignment" value="Assignments" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="studymaterial" value="Study Material" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="live" value="Join LIVE" class="btn btn-primary btn-lg px-5">
                            <br><br>
                  </form>
                    
                  </p>
                </div>
                <div class="col-md-6 mb-4 ml-auto align-self-center">
                  <div class="col-md-25 form-group">
                    <form method="POST" action="stuassign.php">
                  <label for="username">View Pending Submission</label>
                        <form> <select class="form-control" name="users" onchange="showUser(this.value)" required><option value="">Select Assignment:</option>';
                          <?php 
                          $get_teacher=mysqli_query($conn,"SELECT * from subfiles where ftype=1 and subid=$subid and fid not in (select fid from stufiles where sid=$sid)");
                              while($row11=mysqli_fetch_array($get_teacher)) 
                              {
                                    echo '<option value='.$row11["fid"].'>'.$row11["ftname"].'</option>';
                                  }
      
                             echo '</select></form>
                             <br>
                             <div id="txtHint"><b>Assignment Details will be shown here</b></div>';
                             

                        ?>

                            
</form>
<pre>
  
</pre>
<span>Your Submitted Assignments</span>
<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">

                <th>Assignment</th>
                <th>Files</th>
                <th>Date</th>
                </tr></thead><tbody>
                  <?php
                  //$s1="SELECT * FROM stufiles where sid=$sid and fid IN (SELECT * FROM subfiles where ftype=1 and subid=$subid)";
                  $s1="SELECT * FROM stufiles where sid=$sid and fid IN (SELECT fid FROM subfiles where ftype=1 and subid=$subid";
                  $s2=mysqli_query($conn,"SELECT * FROM stufiles where sid=$sid and fid IN (SELECT fid FROM subfiles where ftype=1 and subid=$subid");
                  while ($s3=mysqli_fetch_array($s2)) {
                    $f=$s3['fid'];
                    $s4=mysqli_query($conn,"SELECT * FROM subfiles where fid=$f");
                    $s5=mysqli_fetch_assoc($s4);
                    echo '<tr class="text-center">';
  echo "<td>" . $s5['ftname'] . "</td>";
  echo "<td>" . $s3['sfilename'] . "</td>";
  echo "<td>" . $s3['subdate'] . "</td>";
  echo "</tr>";
}
echo "</tbody></table></div></div></div></div></section>";
                  
                  ?>
</div>
                          
                          
                        
    
              </div>
              </div>
            </div>
          </div>

    
              
    

  </div>


    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

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

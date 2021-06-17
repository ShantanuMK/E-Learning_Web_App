<?php
  $conn=mysqli_connect("localhost","root","","academy");
  session_start();
  if (isset($_POST['view'])) {
      $fid=$_POST['fid'];
      $select = "SELECT * FROM course WHERE cid='$fid' ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->cfile;
        $path = 'files/';
        //$date = $row->created_date;
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
  <title>Academics</title>
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
                    $id1=$_SESSION['sid'];
                    $r11=mysqli_query($conn,"SELECT DISTINCT cid FROM coursetaken where sid='$id1'");
                    $r22=mysqli_num_rows($r11);
                    echo '<li class="nav-item"><a href="dash_student.php" class="nav-link">Dashboard</a></li>';
                    echo '<li class="nav-item"><a href="my_courses.php" class="nav-link">My Courses ('.$r22.')</a></li>';
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

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Reports</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>

      <?php 
      if ($_SESSION['report']==2) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center"> 
                    <th>Course ID</th> 
                    <th>Course name</th>
                    <th>Course Details</th>
                    <th>Fees</th>
                    <th>Duration</th>
                    <th>Mentor name</th>
                    <th>Mentor Email</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM course ");
                  while ($row=mysqli_fetch_array($c1)) {
                      $iid=$row['cid'];
                      $iiname=$row['cname'];
                      $iifile=$row['cfile'];
                      $imid=$row['mid'];
                    echo '<tr class="text-center">
                      
                    
                    <td>'.$iid.'</td>
                    <td>'.$row["cname"].'</td>
                    
                    <td class="product-name"><form method="POST" action="approve.php" ><input type="hidden" name="fid" value='.$iid.'><input type="submit" name="view" class="btn-link" value="File ('.$row['cfile'].')">
                    </td>
                    
                    
                    
                    <td class="quantity">'.$row["cfees"].'
                    </td>
                    <td>'.$row["cmonths"].' Months</td>
                    
                    ';
                    $m1=mysqli_query($conn,"SELECT * FROM mentor WHERE mid='$imid'");
                    $m2=mysqli_fetch_array($m1);
                    $mmname=$m2['mname'];
                    $mmemail=$m2['memail'];
                    echo '<td class="total">'.$mmname.'
                    </td>
                    <td class="seller">'.$mmemail.'</td>';
                
                    if($row['capprove']==0){echo "<td><span style='color:blue'>Action not taken</span></td>";}
                    if($row['capprove']==1){echo "<td><span style='color:green'>Approved</span></td>";}
                    if($row['capprove']==2){echo "<td><span style='color:red'>Disapproved</span></td>";}
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }

  if ($_SESSION['report']==3) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">  
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Password</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM student ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    
                    <td>'.$row["sid"].'</td>
                    
                    <td>'.$row["sname"].'
                    </td>
                    
                    
                    
                    <td>'.$row["semail"].'
                    </td>
                    <td>'.$row["spassword"].'</td>
                    
                    ';
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }


  if ($_SESSION['report']==4) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">  
                    <th>Mentor ID</th>
                    <th>Mentor Name</th>
                    <th>Mentor Email</th>
                    <th>mentor Password</th>
                    <th>Total Earned</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM mentor ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    
                    <td>'.$row["mid"].'</td>
                    
                    <td>'.$row["mname"].'
                    </td>
                    
                    
                    
                    <td>'.$row["memail"].'
                    </td>
                    <td>'.$row["mpassword"].'</td>
                    <td>'.$row["mtearned"].'</td>
                    
                    ';
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }
  if ($_SESSION['report']==5) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>StudentID</th> 
                    <th>StudentName</th> 
                    <th>CourseID</th> 
                    <th>CourseName</th>
                    <th>MentorID</th>
                    <th>MentorName</th>
                    <th>Fees</th>
                    <th>Card</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM payments ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    <td>'.$row["sid"].'</td>
                    <td>'.$row["sname"].'</td>
                    <td>'.$row["cid"].'</td>
                    <td>'.$row["cname"].'</td>
                    <td>'.$row["mid"].'</td>
                    <td>'.$row["mname"].'</td>
                    <td class="quantity">'.$row["fees"].'</td>
                    <td class="quantity">'.$row["cardnumber"].'</td>
                    <td>'.$row["date"].'</td>
                    
                    ';
                    
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }
  ?>

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
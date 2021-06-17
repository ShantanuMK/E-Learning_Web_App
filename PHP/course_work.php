<?php
  $conn=mysqli_connect("localhost","root","","academy");
  session_start();
  $ccc=$_SESSION['cid'];
  $sss=$_SESSION['sid'];
  $vvv=1;
  $getr=mysqli_query($conn,"SELECT * FROM course where cid='$ccc'");
  $r111=mysqli_fetch_assoc($getr);
  $cname=$r111['cname'];
  
  if (isset($_POST['view'])) {
    $vvv=$_POST['ccid'];
    $vs=mysqli_query($conn,"UPDATE coursetaken set videos=1 where cid='$ccc' and cvid='$vvv' ");
  }

  if (isset($_POST['eview'])) {
    $eid=$_POST['eeid'];
    //
    echo $eid;
    $e1=mysqli_query($conn,"SELECT * FROM coursetaken WHERE sid='$sss' and cid='$ccc' and cvid='$eid'");
    $e2=mysqli_fetch_array($e1);
    if ($e2['examg']==0) {
      $_SESSION['vid']=$_POST['eeid'];
      header("Location:exam.php");
    }
    elseif($e2['examg']==1){
      echo '<script>alert("You have already given this exam")</script>';
    }
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
                    echo '<li class="nav-item"><a href="dash_mentor.php" class="nav-link">Dashboard</a></li>';
                    echo '<li class="nav-item"><a href="upload_course.php" class="nav-link">Upload Course</a></li>';
                  }
                  elseif (isset($_SESSION['sid'])) 
                  {
                    $id1=$_SESSION['sid'];
                    $r11=mysqli_query($conn,"SELECT DISTINCT cid FROM coursetaken where sid='$id1'");
                    $r22=mysqli_num_rows($r11);
                    echo '<li class="nav-item"><a href="dash_student.php" class="nav-link">Dashboard</a></li>';
                    echo '<li class="nav-item"><a href="#" class="nav-link">My Courses ('.$r22.')</a></li>';
                  }
                  elseif (isset($_SESSION['aid'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_admin.php" class="nav-link">Dashboard</a></li>';
                    $p1=mysqli_query($conn,"SELECT * FROM admin");
                    $p2=mysqli_fetch_assoc($p1);
                    echo '<li class="nav-item">Total Earned ($.'.$p2["atearned"].')</li>';
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
                          <a href="about.php" class="nav-link text-left">Mentor</a>
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
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"><?php echo $cname; ?></h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="courses.php">Courses</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Courses</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <?php 
            global $video_path;
            $video_path ='videos/';
            //mysqli_query($conn,"UPDATE coursetaken SET videos=1 WHERE sid='$sss' and cid='$ccc' and cvid='$vvv'");
            $query = "SELECT * FROM coursevideo WHERE cid='$ccc' and cvid='$vvv'";
            $sql=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($sql);
?>
            <div class="col-md-2 form-group">
              <h2 class="section-title-underline mb-5">
                            <span><?php echo $row['topicname']?></span>
                        </h2>
                
            </div>
            <video width="125%" controls>
            <source src="<?php echo $GLOBALS['video_path'].$row['cvname'];?>">
            </video>
                </div>
                <div class="col-lg-4 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span>Topics</span>
                        </h2>
                        <?php 
                        $z1="SELECT * FROM coursetaken WHERE cid='$ccc' and sid='$sss'";
                         // $gett="SELECT DISTINCT a.cid,a.cvid,a.cvname,a.topicname,b.cid,b.cvid,b.sid,b.videos,b.examg from coursevideo a, coursetaken b WHERE a.cid='$ccc' AND b.cid='$ccc' and b.sid='$sss'  ";
                       // $gett="SELECT DISTINCT a.cvid,a.cid,a.cvname,a.topicname,b.sid,b.videos,b.examg from coursevideo a, coursetaken b WHERE a.cid='$ccc' and b.sid='$sss' AND a.cid=b.cid GROUP BY ";
                          $rest=mysqli_query($conn,$z1);
                          while ($row1=mysqli_fetch_array($rest)) { 
                          $id=$row1['cvid']; 
                          $g1=mysqli_query($conn,"SELECT * FROM coursevideo WHERE cid='$ccc' and cvid='$id'"); 
                          $r1=mysqli_fetch_array($g1);          
                            echo '<ul><li>'.$r1["topicname"].'</li></ul>';
                            if ($row1['videos']==1) {
                             echo '<form method="POST" action="course_work.php"><ul><span>&#10003;<input type="hidden" name="ccid" value="'.$id.'"><input type="submit" name="view" class="btn-link" value="Video('.$r1['cvname'].')"></span></ul></form>';
                            }
                            else {
                              echo '<form method="POST" action="course_work.php"><ul><input type="hidden" name="ccid" value="'.$id.'"><input type="submit" name="view" class="btn-link" value="Video('.$r1['cvname'].')"></ul></form>'; 
                             }
                            if ($row1['examg']==1) {
                              echo '<form method="POST" action="course_work.php"><ul><span>&#10003;<input type="hidden" name="eeid" value="'.$id.'"><input type="submit" name="eview" class="btn-link" value="Exam"></span></ul></form>';
                            } 
                            
                            else {
                              echo '<form method="POST" action="course_work.php"><ul><input type="hidden" name="eeid" value="'.$id.'"><input type="submit" name="eview" class="btn-link"value="Exam"></ul></form>';
                            }
                            } 
                          
                        ?>
                      </form>
                          
                           
                    </div>
            </div>
        </div>
    </div>    
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>  
            <p><a href="#">Learn More</a></p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Math</a></li>
                  <li><a href="#">Science &amp; Engineering</a></li>
                  <li><a href="#">Arts &amp; Humanities</a></li>
                  <li><a href="#">Economics &amp; Finance</a></li>
                  <li><a href="#">Business Administration</a></li>
                  <li><a href="#">Computer Science</a></li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Help Center</a></li>
                  <li><a href="#">Support Community</a></li>
                  <li><a href="#">Press</a></li>
                  <li><a href="#">Share Your Story</a></li>
                  <li><a href="#">Our Supporters</a></li>
              </ul>
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
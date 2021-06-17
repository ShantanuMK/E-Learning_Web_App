<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","school");
  
  $subid=$_SESSION['subid'];
  $subname=$_SESSION['subname'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];

  if (isset($_POST['upload'])) {
      $subid=$_SESSION['subid'];
      $ename=$_SESSION['ename'];
      $edate=$_SESSION['edate'];
      $etime=$_SESSION['etime'];
      $edur=$_SESSION['edur'];
      $eetime=$_SESSION['eetime'];
      $setname=mysqli_query($conn,"INSERT INTO exam (subid,ename,edate,etime,eetime,eduration) VALUES ($subid,'$ename','$edate','$etime','$eetime',$edur)");
      $geteid=mysqli_query($conn,"SELECT * FROM exam WHERE subid=$subid and ename='$ename' ");
      $r=mysqli_fetch_assoc($geteid);

      $eid=$r['eid'];

    for ($i=0; $i < $_SESSION['eqnum'] ; $i++) { 
      $ei= $i+1;
      $e_text = mysqli_real_escape_string($conn, $_POST['e_que'][$i]);
      $ea=$_POST['ea'][$i];
      $eb=$_POST['eb'][$i];
      $ec=$_POST['ec'][$i];
      $ed=$_POST['ed'][$i];
      $eqc=$_POST['e_c'][$i];
      $sqll="INSERT INTO examq (eid,eqn,eq,ea,eb,ec,ed,ecorrect) values ($eid ,'$ei','$e_text','$ea','$eb','$ec','$ed','$eqc')";
      mysqli_query($conn,$sqll);
    }
    unset($_SESSION['eqnum']);
    unset($_SESSION['ename']);
    unset($_SESSION['edate']);
    unset($_SESSION['etime']);
    unset($_SESSION['edur']);
    header("Location:viewsub.php");  
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
            <a href="#" class="small mr-3"> “Failure is the opportunity to begin again more intelligently.” – Henry Ford</a> 
            
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
                    <li><a href="">Our Teachers</a></li>
                    <li><a href="">Our School</a></li>
                  </ul>
                </li>
                <?php 
                if (isset($_SESSION['tid']) || isset($_SESSION['school_id']) || isset($_SESSION['sid'])) {

                 if (isset($_SESSION['tid'])) 
                  {
                    
                    echo '<li class="nav-item"><a href="dash_mentor.php" class="nav-link">Dashboard</a></li>';
                    
                  }
                  elseif (isset($_SESSION['sid'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_student.php" class="nav-link">Dashboard</a></li>';
                  }
                  elseif (isset($_SESSION['aid'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_admin.php" class="nav-link">Dashboard</a></li>';
                  }

                  if (isset($_SESSION['sname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['sname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['tname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['tname'].'</a></li>';
                  }
                  echo '<li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>';
                }
                else {
                        echo '<li>
                          <a href="login_student.php" class="nav-link text-left">Students</a>
                        </li>
                        <li>
                          <a href="login_mentor.php" class="nav-link text-left">Teacher</a>
                        </li>
                        <li>
                          <a href="login_admin.php" class="nav-link text-left">School</a>
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
              <center><h2 class="mb-0"><?php echo'Class:'.$class,$div; echo' '.$subname;  ?></h2></center>
              
            </div>
          </div>
        </div>
      </div> 

    
            <div class="col-lg-7">
              <center><h2 class="mb-0">Upload Exam Questions</h2></center>
              </div>

      <form action="upload_exam.php" method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">

                          <?php 
                            for ($i=1; $i <= $_SESSION['eqnum']; $i++) { 
                              echo '<div class="col-md-12 form-group">
                                                
                                            </div>
                                            <div class="col-md-12 form-group">
                                                
                                            </div>
                                            
                                            <div class="col-md-12 form-group">
                                              <label for="username">Enter the Question '.$i.'</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                  <textarea 
                                                id="text" 
                                                cols="40" 
                                                rows="4" 
                                                name="e_que[]" 
                                                placeholder="" required></textarea>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="username">Enter option A</label>
                                                <input type="text" name="ea[]" placeholder="" class="form-control form-control-lg" required>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="username">Enter option B</label>
                                                <input type="text" name="eb[]" placeholder="" class="form-control form-control-lg" required>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="username">Enter option C</label>
                                                <input type="text" name="ec[]" placeholder="" class="form-control form-control-lg" required>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="username">Enter option D</label>
                                                <input type="text" name="ed[]" placeholder="" class="form-control form-control-lg" required>
                                            </div>        
                                            <div class="col-md-12 form-group">
                                                <label for="username">Enter the correct option (a/b/c/d)</label>
                                                <input type="text" name="e_c[]" placeholder="" class="form-control form-control-lg" required>
                                            </div>      
                                        </div>
                                         <div class="row">* * * * * * * * * * * * * * * * * * * * * * * * * * *';
                            }
                          ?>
                         
                        <div class="col-12">
                            <input type="submit" name="upload" value="Upload Exam" class="btn btn-primary btn-lg px-5">
  <a href="dash_mentor.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                            
                        </div>
                    </div>
                </div>
            </div>   
          </form>
      
       <pre>



       </pre>               
                    
      


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
<?php
  $conn=mysqli_connect("localhost","root","","school");
  session_start();

  $subid=$_SESSION['subid'];
  $subid=$_SESSION['subid'];
  $subname=$_SESSION['subname'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];



  if (isset($_POST['view'])) {
      $fid=$_POST['fileid'];
      $select = "SELECT * FROM subfiles WHERE fid=$fid ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->filename;
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


    
<!--
    <div class="site-section">
        <div class="container">
            
            <div class="row justify-content-center">
               <div class="col-md-6 mb-4">
                <form action="studym.php" method="post" class="billing-form" enctype="multipart/form-data">
                <h2 class="section-title-underline mb-5">
                            <span>Study Material</span>
                        </h2>
                        <ol>
                        <?php 
                        $query1="SELECT * FROM subfiles WHERE ftype=2 and subid=$subid";
                        $result1=mysqli_query($conn,$query1);
                        while ($row=mysqli_fetch_array($result1)) {
                          echo '<strong class="text-black d-block"><li>'.$row["ftname"].'</li>
                            </strong> ';
                            echo '<form method="POST" action="studymaterial.php"><ul><input type="hidden" name="fileid" value="'.$row['fid'].'"><input type="submit" name="view" class="btn-link" value="File('.$row['filename'].')"></ul></form>';
                        }
                        ?>
                         </ol>
                          
                            

                          
                 </form>   
                </div>
                
            </div>
          
        </div>
    </div>
-->
    <div class="site-section">
        <div class="container">
            <div class="row">
              <div class="col-md-4 mb-4">
                  <p>
                  <form method="post" action="subwork.php">
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
                <div class="col-lg-7 ml-auto align-self-center">
                  <div class="col-md-30 form-group">
                    <form action="studym.php" method="post" class="billing-form" enctype="multipart/form-data">
                <h2 class="section-title-underline mb-5">
                            <span>Study Material</span>
                        </h2>
                        <ol>
                        <?php 
                        $query1="SELECT * FROM subfiles WHERE ftype=2 and subid=$subid";
                        $result1=mysqli_query($conn,$query1);
                        while ($row=mysqli_fetch_array($result1)) {
                          echo '<strong class="text-black d-block"><li>'.$row["ftname"].'</li>
                            </strong> ';
                            echo '<form method="POST" action="studymaterial.php"><ul><input type="hidden" name="fileid" value="'.$row['fid'].'"><input type="submit" name="view" class="btn-link" value="File('.$row['filename'].')"></ul></form>';
                        }
                        ?>
                         </ol>
                          
                            

                          
                 </form>
                    
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
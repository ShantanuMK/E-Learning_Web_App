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
    xmlhttp.open("GET","getuser.php?q="+str,true);
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
<pre>



</pre>
    <div class="site-section">
        <div class="container">

            <form action="add_subject.php" method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Subject Name</label>
                            <input type="text" name="s_name" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                          <label for="username">Allocate Teacher for this Subject</label>
                        <form method="GET"> <select class="form-control" name="teacherid"><option>Select Teacher:</option>';
                              <?php 
                              $teacher="SELECT * from teachers where school_id=1";
                              $get_teacher=mysqli_query($conn,$teacher);
                              
                              while($row11=mysqli_fetch_array($get_teacher)) 
                              {
                                $teacher_name=$row11['tname'];
                                $teacher_id=$row11['tid'];
                                $subj="SELECT COUNT(*) from subjects where tid=$teacher_id";
                                $sub_result=mysqli_query($conn,$subj);
                                $subjects_num=mysqli_fetch_assoc($sub_result);

                                echo '<option value='.$teacher_id.'>'.$teacher_name.' ('.$subjects_num["COUNT(*)"].')</option>';
                                
                             } 
                             echo '</select><pre>
                             </pre><input type="submit" name="view" value="View Current Subjects" class="btn btn-primary btn-lg px-5"></form>';
                             if (isset($_GET['view'])) {
                               $value=$_GET['teacherid'];
                               echo $value,$value;
                             }

                        ?>
                        </div>
                        
                        
                        
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="upload" value="Allocate" class="btn btn-primary btn-lg px-5">
                            <a href="index.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
</form>
          
        </div>
    </div>

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
    xmlhttp.open("GET","a1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


    <form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">varpe</option>
  <option value="2">dixit</option>
  <option value="3">mahajan</option>
  <option value="4">karpe</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>


<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','school');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM teachers WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>tname</th>
<th>temail</th>
<th>tpassword</th>
<th>tmobile</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['tname'] . "</td>";
  echo "<td>" . $row['temail'] . "</td>";
  echo "<td>" . $row['tpassword'] . "</td>";
  echo "<td>" . $row['tmobile'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>


<iframe name="votar" style="display:none;"></iframe>
<form action="a1.php" method="post" target="votar">
    <input type="submit" value="Skicka Tips">
    <input type="hidden" name="ad_id" value="2">            
</form>
<pre>





</pre>   

  

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
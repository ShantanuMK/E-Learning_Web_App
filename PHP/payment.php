<?php
    $conn=mysqli_connect("localhost","root","","academy");
    session_start();
    $ccc=$_SESSION['cid'];
    $sss=$_SESSION['sid'];
    if (isset($_POST['pay'])) {
      $cardnum=$_POST['card_num'];
        $get1=mysqli_query($conn,"SELECT * FROM coursevideo where cid='$ccc'");
      while ($rrr=mysqli_fetch_array($get1)) {
        $i1=$rrr['cvid'];
        mysqli_query($conn,"INSERT INTO coursetaken (sid,cid,cvid) values ('$sss','$ccc','$i1')");    
      }
      $r1=mysqli_query($conn,"SELECT * FROM course where cid='$ccc'");
      $row1=mysqli_fetch_array($r1);
      $fee=$row1['cfees'];
      $mmm=$row1['mid'];

      $mentorfee=$fee*0.6;
      $adminfee=$fee*0.4;

      $r2=mysqli_query($conn,"SELECT * FROM mentor where mid='$mmm'");
      $row2=mysqli_fetch_array($r2);
      $mtotal=$row2['mtearned'];
      $mtotal=$mtotal+$mentorfee;
      mysqli_query($conn,"UPDATE mentor SET mtearned='$mtotal' WHERE mid='$mmm'");

      $a1=mysqli_query($conn,"SELECT * FROM admin ");
      $a2=mysqli_fetch_array($a1);
      $atotal=$a2['atearned'];
      $atotal=$atotal+$adminfee;
      mysqli_query($conn,"UPDATE admin SET atearned='$atotal' ");

      $p1=mysqli_query($conn,"SELECT a.cid,a.cname,b.sid,b.sname,c.mid,c.mname FROM course a, student b, mentor c WHERE a.cid='$ccc' and b.sid='$sss' and c.mid='$mmm'");
      $p2=mysqli_fetch_array($p1);
      $student_name=$p2['sname'];
      $course_name=$p2['cname'];
      $mentor_name=$p2['mname'];
      mysqli_query($conn,"INSERT INTO payments (sid,sname,cid,cname,mid,mname,fees,cardnumber) values ('$sss','$student_name','$ccc','$course_name','$mmm','$mentor_name','$fee','$cardnum')");

      echo '<script>alert("Successfully Registered For This Course.")</script>';
      header("Location:dash_student.php");
    }




?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<div style="position: absolute; left: 20%; margin-left: 225px; width: 350px; height: 200px; border: 4px solid black">
    <div class="row justify-content-center">
            <div class="card p-3">
                <div class="row justify-content-center">
                    <div class="col-12">
                    </div>
                </div>
                <form method="POST" action="payment.php"  class="form-card">
                    <div class="row">
                    <div class="row justify-content-center mb-4 radio-group">
                        <div class="col-md-5">
                            <div class='radio mx-auto' data-value="visa"> <img class="fit-image" src="https://i.imgur.com/OdxcctP.jpg" width="105px" height="55px"><img class="fit-image" src="https://i.imgur.com/WIAP9Ku.jpg" width="105px" height="55px"><img class="fit-image" src="https://i.imgur.com/cMk1MtK.jpg" width="105px" height="55px"> </div>
                        </div> <br>
                    </div>
                </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="input-group"> <input type="text" name="Name" placeholder="John Doe"> <label>Name on card</label> </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="input-group"> <input type="text" id="cr_no" name="card_num" placeholder="0000-0000-0000-0000" minlength="16" maxlength="16" required> <label>Card Number</label> </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group"> <input type="text" id="exp" name="expdate" placeholder="MM/YY" minlength="5" maxlength="5" required> <label>Expiry Date</label> </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group"> <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3" required> <label>CVV</label> </div>
                                </div>
                            </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12"> <input type="submit" name="pay" value="Pay" class="btn btn-pay placeicon"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
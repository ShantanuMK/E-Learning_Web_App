<?php  
 $connect = mysqli_connect("localhost", "root", "", "school");
 session_start();
 $schoolid=$_SESSION['school_id'];
 $class=$_SESSION['cstd'];
 $div=$_SESSION['cdiv'];  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';
      $ssrno = mysqli_real_escape_string($connect, $_POST["ssrno"]);  
      $sname = mysqli_real_escape_string($connect, $_POST["sname"]);
      $sloginid = mysqli_real_escape_string($connect, $_POST["sloginid"]);
      $spassword = mysqli_real_escape_string($connect, $_POST["spassword"]);
      $semail = mysqli_real_escape_string($connect, $_POST["semail"]);
      $smnum = mysqli_real_escape_string($connect, $_POST["smnum"]);  
       
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE students SET sname='$sname' , ssrno=$ssrno, sloginid='$sloginid' , spassword='$spassword' , semail='$semail', smnum=$smnum WHERE sid='".$_POST["employee_id"]."'";  
           $message = 'Data Updated'; 
           
      }  
        
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM students WHERE sstd=$class and sdiv='$div' and school_id=$schoolid";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Roll No.</th>
                          <th>Name</th>
                          <th>Login-ID</th>
                          <th>Password</th>
                          <th>Email-ID</th> 
                          <th>Password</th> 
                          <th>Edit</th>  
                          <th>Remove</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["ssrno"] . '</td>
                          <td>' . $row["sname"] . '</td>
                          <td>' . $row["sloginid"] . '</td>
                          <td>' . $row["spassword"] . '</td>
                          <td>' . $row["semail"] . '</td>
                          <td>' . $row["smnum"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["sid"] .'" class="btn btn-info btn-xs edit_data" /></td>
                          <td><a href="viewstudent.php" class="btn btn-info btn-xs">Remove</a></td> 
                     </tr>  
                ';   
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 
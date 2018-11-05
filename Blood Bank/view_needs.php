<?php
  require('before_login_require.html');
  require('db_connect.php');
  if(isset($_POST['view_submit'])){
    $name=$_POST['acceptor'];
    $mail=$_POST['gmail'];
    $bg=$_POST['blood'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $date=date("Y/m/d");
    $query="insert into needs values('$name','$mail','$bg','$phone','$city','$date');";
    mysqli_query($con,$query);
  }
  echo "<style>th,tr{text-align:center;}</style>";
  echo "<center><table width='80%'><tr style='background-color:#D0CECE;height:50px;'><th>Name</th><th>Gmail</th><th>Blood Group</th><th>Phone Number</th><th>City/Town</th><th>Date Uploaded</th></tr>";
  $query="select * from needs order by date desc;";
  $res=mysqli_query($con,$query);
  if(mysqli_num_rows($res)){
    while($row=mysqli_fetch_assoc($res)){
      echo "<tr style='height:40px;'>";
      echo "<td>".$row['Acceptor']."</td><td>".$row['Gmail']."</td><td>".$row['BloodGroup']."</td><td>".$row['Phone']."</td><td>".$row['City']."</td><td>".$row['date']."</td>";
      echo "</tr>";
    }
  }
  else {

  }
  echo "</table></center>";
?>

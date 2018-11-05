<!--Mail , phone number,Blood Group,DOB,Room , Hno,Colony,CityTown-->
<?php
  session_start();
  $user=$_SESSION['user_name'];
  require("loggedin_require.php");
  require("db_connect.php");
  if(isset($_POST['updatex']))
  {
    $phone=$_POST['phone'];
    $bg=$_POST['group'];
    $dob=$_POST['dob'];
    $room=$_POST['room'];
    $hno=$_POST['hno'];
    $colony=$_POST['colony'];
    $city=$_POST['city'];
    $query="update registerDB set PhoneNumber='$phone',BloodGroup='$bg',DOB='$dob',Room='$room',HouseNo='$hno',Colony='$colony',CityTown='$city' where Mail='$user';";
    $res=mysqli_query($con,$query);
  }
  $query="select * from registerDB where Mail='$user';";
  if($res=mysqli_query($con,$query))
  {
    if(mysqli_num_rows($res))
    {
      echo "<form action='' method='post'>";
      ?>
      <style>
        input[type=text]
        {
          border-width: 0px 0px 1px 0px;
          border-bottom-color:black;
          background-color: white;
          text-align:right;
        }
        tr
        {
          height:50;
        }

      </style>
      <?php
      echo "<center><table width='50%'><tr>";
      while($rows=mysqli_fetch_array($res))
      {
        echo "<tr><td>Mail</td><td><input type='text' class='inp' name='mail' value='".$rows['Mail']."' disabled></td></tr>";
        echo "<tr><td>PhoneNumber</td><td><input type='text' class='inp' name='phone' value='".$rows['PhoneNumber']."'></td></tr>";
        echo "<tr><td>BloodGroup</td><td><input type='text'  class='inp' name='group' value='".$rows['BloodGroup']."'></td></tr>";
        echo "<tr><td>DOB</td><td><input type='text' name='dob'  class='inp' value='".$rows['DOB']."'></td></tr>";
        echo "<tr><td>Room No</td><td><input type='text'  class='inp' name='room' value='".$rows['Room']."'></td></tr>";
        echo "<tr><td>HNo</td><td><input type='text' name='hno' class='inp' value='".$rows['HouseNo']."'></td></tr>";
        echo "<tr><td>Colony</td><td><input type='text' class='inp' name='colony' value='".$rows['Colony']."'></td></tr>";
        echo "<tr><td>City</td><td><input type='text' class='inp' name='city' value='".$rows['CityTown']."'></td></tr>";
      }
      echo "<tr><td colspan=2 align='center'><input type='submit' class='btn' name='updatex' value='Update'></td></tr>";
      echo "</table></center>";
      echo "</form>";
    }
  }

?>

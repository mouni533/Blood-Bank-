<!DOCTYPE html>
<html>
    <head>
        <title>Register Form</title>
        <script type="text/javascript">
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                return true;
            }
        </script>
    </head>
    <body>
        <?php require("before_login_require.html");?>
        <center>
        <h2>Registration Form</h2><br>
        <?php
            $mail_check="<br>";
            $check_phone="<br>";
            $x=0;$y=0;
            $mail=strtolower(filter_input(INPUT_POST,'register_mail'));
            $phone=filter_input(INPUT_POST,'register_phone');
            $bg=filter_input(INPUT_POST,'register_blood');
            $day=filter_input(INPUT_POST,'register_day');
            $month=filter_input(INPUT_POST,'register_month');
            $totalmonth=array("January","February","March","April","May","June","July","August","September","October","November","December");
            $mon=1;
            for($i=0;$i<12;$i++)
            {
                if($totalmonth[$i]==$month)
                {
                    $mon=$i+1;
                    break;
                }
            }
            $year=filter_input(INPUT_POST,'register_year');
            $dob=$day."/".$mon."/".$year;
            $room=filter_input(INPUT_POST,'room_no')?"":filter_input(INPUT_POST,'room_no');
            $house=filter_input(INPUT_POST,'house_no');
            $colony=filter_input(INPUT_POST,'colony');
            $city_town=filter_input(INPUT_POST,'city_town');
            $pwd=filter_input(INPUT_POST,'register_password');
            require("db_connect.php");
            if(isset($_POST['register_phone']))
            {
                $query="select * from registerDB where PhoneNumber='$phone';";
                $link=mysqli_query($con,$query);
                if($link)
                {
                    $rows=mysqli_num_rows($link);
                    if($rows)
                    {
                        $x=1;
                        $check_phone="Phone Number already registered";
                    }
                }
            }
            if(isset($_POST['register_mail']))
            {
                $query="select * from registerDB where Mail='$mail';";
                $link=mysqli_query($con,$query);
                if($link)
                {
                    $rows=mysqli_num_rows($link);
                    if($rows)
                    {
                        $y=1;
                        $mail_check="Mail already exits";
                    }
                }
            }
            if(isset($_POST['register_mail']))
            {
                if($x!=1&&$y!=1)
                {
                    $query="insert into registerDB values('$mail','$phone','$bg','$dob','$room','$house','$colony','$city_town');";
                    mysqli_query($con,$query);
                    $query1="insert into loginDB values('$mail','$pwd');";
                    mysqli_query($con,$query1);
                    header("Location:user_login.php");
                }
            }
        ?>
        <form action="user_register.php" method="post">
            <table>
                <tr><td colspan="3"><input type="email" class="form-control" placeholder="Gmail Address" name="register_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  required/></td></tr>

                <tr>
                    <td colspan="3" style="color:red;text-align:right;">
                        <?php
                            require("db_connect.php");
                            $mail_check="<br>";
                            if(isset($_POST['register_mail']))
                            {
                                $mail=filter_input(INPUT_POST,'register_mail');
                                $query="select * from registerDB where Mail='$mail';";
                                $link=mysqli_query($con,$query);
                                if($link)
                                {
                                    $rows=mysqli_num_rows($link);
                                    if($rows)
                                    {
                                        $mail_check="Mail already registered";
                                    }
                                }
                            }
                            echo "<font size=2>".$mail_check."</font>";
                        ?>
                    </td>
                </tr>

                <tr><td colspan="3"><input type="password" class="form-control" placeholder="Password" name="register_password"  required/></td></tr>
                <tr><td colspan="3"><br></td></tr>
                <tr><td colspan="3"><input type="text" class="form-control" placeholder="Phone Number" maxlength="10" name="register_phone" onkeypress="return isNumberKey(event)" required/></td></tr>
                <tr><td colspan="3" style="color:red;text-align:right;"><?php echo "<font size=2>".$check_phone."</font>";?><td></tr>

                <tr>
                    <td>
                        <select name="register_day" class="form-control">
                            <?php
                                for($i=1;$i<=31;$i++)
                                {
                                    echo "<option>".$i."</option>";
                                }
                            ?>
                        </select>
                      </td>
                      <td>
                        <select name="register_month" class="form-control">
                            <?php
                                $months=array("January","February","March","April","May","June","July","August","September","October","November","December");
                                for($i=0;$i<12;$i++)
                                {
                                    echo "<option>".$months[$i]."</option>";
                                }
                            ?>
                        </select>
                      </td>
                      <td>
                        <select name="register_year" class="form-control">
                            <?php
                                for($i=2000;$i>1950;$i--)
                                {
                                    echo "<option>$i</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="3">
                        <select name="register_blood" class="form-control">
                            <?php
                                $blood=array("A+","A-","B+","B-","AB+","AB-","O+","O-");
                                for($i=0;$i<8;$i++)
                                {
                                    echo "<option>".$blood[$i]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr><td colspan="3"><input type="text" class="form-control" placeholder="Room No." name="room_no"></td></tr>
                <tr><td><br></td></tr>
                <tr><td colspan="3"><input type="text" class="form-control" placeholder="HNo." name="house_no"></td></tr>
                <tr><td><br></td></tr>
                <tr><td colspan="3"><input type="text" class="form-control" placeholder="Colony" name="colony"></td></tr>
                <tr><td><br></td></tr>
                <tr><td colspan="3"><input type="text" class="form-control" placeholder="City/Town" name="city_town"></td></tr>
                <tr><td colspan="3"><br></td></tr>
            </table>
            <input type="submit" class="btn" name="submit" value="Register">
        </form>
        <br>
        <br>
        <br>
        </center>
    </body>
</html>

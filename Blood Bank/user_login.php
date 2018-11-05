<?php
    require('before_login_require.html');
    require('db_connect.php');
    $error1="<br>";$error2="<br>";
    if(isset($_POST['mail']))
    {
        $user_mail=filter_input(INPUT_POST, 'mail');
        $user_password=filter_input(INPUT_POST, 'password');

        $query="select * from loginDB where Mail='$user_mail';";
        $link= mysqli_query($con,$query);
        if($link)
        {
            $rows= mysqli_num_rows($link);
            if($rows==1)
            {
              $error1="<br>";
            }
            else
            {
              $error1="* Invalid MailID";
            }
        }

        $query="select * from loginDB where Mail='$user_mail' and Password='$user_password';";
        $link= mysqli_query($con,$query);
        if($link)
        {
            $rows= mysqli_num_rows($link);
            if($rows==1)
            {
                session_start();
                $_SESSION['user_name']=$user_mail;
                header('Location:user_loggedin.php');
                $error2="<br>";
            }
            else
            {
              $error2="* Invalid Password";
            }
        }
    }
?>
<form action="" method="post">
    <table align="center">
        <tr><td> <br></td></tr><tr><td> <br></td></tr>
        <tr><td><center><h2>Login</h2></center></td></tr><tr><td> <br></td></tr>
        <tr class="form-group"><td><input type="text" class="form-control" name="mail" placeholder="Mail" required="required"></td></tr>
        <tr><td style="color:red;text-align:right"><font size=2><?php echo $error1;?></font></td></tr>
        <tr class="form-group"><td><input type="password" name="password" placeholder="Password" class="form-control" required="required"></td></tr>
        <tr><td style="color:red;text-align:right"><font size=2><?php echo $error2;?></font></td></tr>
        <tr><td><br></td></tr>
        <tr><td><center><input type="submit" value="Login" class="btn"></center></td></tr>
        <tr><td><br></td></tr>
        <tr><td><center><a style="text-decoration:none;color:#7A786E;" href="user_register.php">Don't have a account ? Create a new account</a></center></td></tr>
    </table>
</form>

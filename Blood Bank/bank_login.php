<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
    </head>
    <body>
        <?php
            $error="<br>";
            require('before_login_require.html');
            require('db_connect.php');
            if(isset($_POST['mail']))
            {
                $user_mail=filter_input(INPUT_POST, 'mail');
                $user_password=filter_input(INPUT_POST, 'password');
                $query="select * from bankloginDB where UserName='$user_mail' and Password='$user_password';";
                $link= mysqli_query($con,$query);
                if($link)
                {
                    $rows= mysqli_num_rows($link);
                    if($rows==1)
                    {
                        session_start();
                        $_SESSION['user_name']=$user_mail;
                        header('Location:bank_loggedin.php');
                    }
                    else
                    {
                        $error="* Invalid Password";
                    }
                }
            }
        ?>
        <form action="" method="post">
            <table align="center">
                <tr><td> <br></td></tr><tr><td> <br></td></tr>
                <tr><td><center><h2>Login</h2></center></td></tr><tr><td> <br></td></tr>
                <tr><td><input type="text" class="form-control" size="30" name="mail" placeholder="User ID" required="required"></td></tr>
                <tr><td><br></td></tr>
                <tr><td><input type="password" class="form-control" name="password" placeholder="Password" required="required"></td></tr>
                <tr><td style="color:red;text-align:right"><font size=2><?php  echo $error;?></font></td></tr>
            </table><br>
            <center><input type="submit" value="Login" class="btn"></center>
        </form>
    </body>
</html>

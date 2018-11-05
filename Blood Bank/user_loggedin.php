<html>
    <body>
        <?php
            session_start();
            $user=$_SESSION['user_name'];
            require("loggedin_require.php");
            if($user==NULL)
            {
                header("Location:user_login.php");
            }
        ?>
        <form action="find_blood.php" method="post">
            <table align="center">
                <tr>
                    <td colspan="2">Search Blood : </td>
                    <td>
                        <select name="find_bg" class="form-control">
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
                <tr><td colspan="3"><br></td></tr>
            </table>
            <center><input type="submit" class="btn" name="submit"></center>
        </form>
    </body>
</html>

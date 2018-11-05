<html>
    <head>
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button
            {
              -webkit-appearance: none;
              margin: 0;
            }
        </style>
    </head>
    <body>
        <form method="post">
                <?php
                    require('before_login_require.html');
                    $bb=array("IndianRedCross","jeevanbloodbank","kakathiyabloodbank","MGMbloodbank");
                    $group=array("","A+","A-","AB+","AB-","B+","B-","O+","O-");
                    require("bank_db_connect.php");
                    session_start();
                    switch($_SESSION['user_name'])
                    {
                        case "Kakathiya":$bank="kakathiyabloodbank";break;
                        case "MGMbloodbank":$bank="MGMbloodbank";break;
                        case "Jeevan":$bank="jeevanbloodbank";break;
                        case "RedCross":$bank="IndianRedCross";break;
                    }
                    if(isset($_POST['submit']))
                    {
                        for($i=1;$i<=8;$i++)
                        {
                            if($_POST['name'.$i]!=NULL)
                            {
                                $num=(int)$_POST['name'.$i];
                                $link=mysqli_query($db_con,"update $bank set Amount=Amount+$num where BloodGroup='$group[$i]';");
                            }
                        }
                    }

                    echo "<table border='1'><tr><th>Blood Group</th><th>Amount</th><th>Update</th></tr>";
                    $link=mysqli_query($db_con,"select * from ".$bank.";");
                    if($link)
                    {
                        $i=1;
                        while($arr=mysqli_fetch_array($link))
                        {
                            echo "<tr><td>".$arr['BloodGroup']."</td><td>".$arr['Amount']."</td>";
                            echo "<td><input type='number' name='name$i'></td></tr>";
                            $i++;
                        }
                        echo "</table>";
                    }
                ?>
            <input type="submit" name="submit" hidden>
        </form>
    </body>
</html>

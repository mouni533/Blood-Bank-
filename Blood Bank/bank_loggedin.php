<html>
    <head>
        <style>

        </style>
    </head>
    <body>
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

                    echo "<form method='post'>";
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
                    }?>
                    <script type="text/javascript">
                    function isNumberKey(evt)
                      {
                         var charCode = (evt.which) ? evt.which : event.keyCode
                         if(charCode==189)
                          return true;
                         //alert(charCode);
                         if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;

                         return true;
                      }
                      </script>
                      <style>
                        tr,th{height:40px;text-align:center;}

                      </style>
                      <?php
                    echo "<center><table width='50%'><tr style='background-color:#D0CECE'><th>Blood Group</th><th>Amount</th><th>Update</th></tr>";
                    $link=mysqli_query($db_con,"select * from ".$bank.";");
                    if($link)
                    {
                        $i=1;
                        while($arr=mysqli_fetch_array($link))
                        {
                            echo "<tr><td>".$arr['BloodGroup']."</td><td>".$arr['Amount']."</td>";
                            echo "<td><input type='text' class='form-control' name='name$i' onkeydown='return isNumberKey(event)'></td></tr>";
                            $i++;
                        }
                        echo "</table></center>";
                    }
                ?>
            <input type="submit" name="submit" hidden>
        </form>
    </body>
</html>

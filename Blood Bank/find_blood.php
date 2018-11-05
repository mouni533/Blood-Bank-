<html>
    <body>
      <style>td{font-size: 14;}</style>
    <?php
        session_start();
        $user=$_SESSION['user_name'];
        require("loggedin_require.php");
        if($user==NULL)
        {
            header("Location:user_login.php");
        }
        $bg=filter_input(INPUT_POST,'find_bg');
        $city=filter_input(INPUT_POST,'find_city');
        require("db_connect.php");
        require("bank_db_connect.php");
        $bb=array("IndianRedCross","jeevanbloodbank","kakathiyabloodbank","MGMbloodbank");
        echo "<center><h3>Information about BloodBanks</h3><br>";
        echo "<style>th,tr{text-align:center;}</style>";
        echo "<table width='70%'><tr height='50' style='background-color:#D0CECE;'><th>Blood Bank</th><th>Amount</th></tr>";
        $found=0;
        for($i=0;$i<4;$i++)
        {
            $link=mysqli_query($db_con,"select * from ".$bb[$i]." where BloodGroup='$bg';");
            if($link)
            {
                while($arr=mysqli_fetch_array($link))
                {
                    if($arr['Amount']!=0)
                    {
                        echo "<tr height='50'><td>".$bb[$i]."</td><td>".$arr['Amount']."</td></tr>";
                        if($arr['Amount']!=0)
                        {
                            $found=1;
                        }
                    }
                }
            }
        }
        if($found==0){
            echo "<tr scope='row' align='center'><td colspan='2'>No Blood group Found in Blood Banks</td></tr>";
        }
        echo "</table></center>";

        echo "<center><h3>Information about Users</h3><br>";
        $query="select * from registerDB where BloodGroup='$bg';";
        $link=mysqli_query($con,$query);
        $found=0;
        if($link)
        {
            echo "<table width='90%'><tr style='background-color:#D0CECE;height:50'><th>Phone Number</th><th>Gmail Address</th><th>Address</th></tr>";
            while($arr=mysqli_fetch_array($link))
            {
                $found=1;
                echo "<tr height='100'><td>".$arr['PhoneNumber']."</td><td>".$arr['Mail']."</td><td>".$arr['HouseNo']."<br>".$arr['Colony']."<br>".$arr['CityTown']."</td></tr>";
            }
            if($found==0)
            {
                echo "<tr  height='100'><td align='center' colspan='3'>No Donars found in DataBase</td></tr>";
            }
            echo "</table></center>";
        }
    ?>
    </body>
</html>

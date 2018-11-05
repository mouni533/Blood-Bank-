<?php
  session_start();
  $user=$_SESSION['user_name'];
  require("before_login_require.html");
  require("db_connect.php");
  ?>
  <center>
    <script type="text/javascript">
    function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      </script>
  <br><br>
  <form method='post' action='view_needs.php'>
  <table width='40%'>
    <tr><td><input type='text' name='acceptor' class='form-control' placeholder='Accepter Name'></td></tr>
    <tr><td><br></td></tr>
    <tr><td><input type='text' name='gmail' class='form-control' placeholder='Gmail ID'></td></tr>
    <tr><td><br></td></tr>
    <tr>
      <td>
        <select name="blood" class="form-control">
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
        </select>
      </td>
    </tr>
    <tr><td><br></td></tr>
    <tr><td><input name='phone' class='form-control' type='text' placeholder='Phone Number' onkeydown="return isNumberKey(event)" maxlength="10"></td></tr>
    <tr><td><br></td></tr>
    <tr><td><input name='city' class='form-control' type='text' placeholder='City'></td></tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr><td><center><input type='submit' value='Upload' name='view_submit' class='btn'></center></td></tr>
  </table>
</form>
  </center>

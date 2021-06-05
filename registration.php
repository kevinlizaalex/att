<?php
  include "include/header.php";
?>
    <?php
    if(isset($_POST["password"]))
    {
      include "include/dbconnect.php";
      $r_name = $_POST["name"];
      $r_email = $_POST["email"];
      $r_phone = $_POST["phone"];
      $r_password = $_POST["password"];

      $query = "SELECT phone FROM  tbl_user WHERE phone = '$r_phone' ";
      $result1 = mysqli_query($conn, $query);
      if(mysqli_num_rows($result1))
      {
        echo "<br><font color=red face=Bahnschrift><center>Registration failed. Username exists<center></font>";
      }
      else
      {
        if(isset($_POST["register"]))
        {
          $sql = "INSERT INTO tbl_user (name,email,phone,password) VALUES ('$r_name' , '$r_email' , '$r_phone' , '$r_password' )";
          $res = mysqli_query($conn, $sql);
        }
      }
    }
  ?>

  <div class="log">
      <div class="container" align="center">
        <form name="regform" action="#" method="post">
          <input type="text" placeholder="Name" name="name">
          <input type="text" placeholder="Email" name="email">
          <input type="text" placeholder="Phone" name="phone" onkeypress="return isNumberKey(event)">
          <input type="password" placeholder="Password" name="password">
          <input type="password" placeholder="Re-enter password" name="rpassword">
          <input type="submit" value="Register" name="register"> 
        </form>  
      </div>
  </div>
  <?php
    global $result1;
    if ($result1) {
    echo ("<script LANGUAGE='JavaScript'>alert('Account successfully created. Please login...');window.location.href='login.php';</script>");
    }
            
  ?>

  <div class="container" align="center">
        already a user? <a href="login.php">Sign up</a>.
    </div>

  <div class="bot">
    <div>
      ©2019 AT&T Intellectual Property. All rights reserved.
    </div>
  </div>

</body>
</html>
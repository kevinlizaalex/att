<?php
  include("include/header.php");
  include("include/dbconnect.php");
  if(isset($_SESSION["id"])==session_id())
  {
    
  echo ("<script LANGUAGE='JavaScript'>
        window.alert('You have already logined.');
        window.location.href='services.php';
      </script>");
  }
  else
  {
?>

  <div class="log">
      <div class="container" align="center">
        <form name="logform" method="post">
          <input type="text" id="phome" placeholder="phone number" name="phone">
          <input type="password" id="password" placeholder="password" name="password">
          <font color="red">
            
          </font>
          <input type="Submit" value="Login" name="login">
          <?php
            if(isset($_POST['login']))
            {

              $l_phone = $_POST['phone'];
              $l_password = $_POST['password'];

              $query = "SELECT * FROM tbl_user WHERE phone = '$l_phone' AND password = '$l_password'";
              $result = mysqli_query($conn,$query);


              if (mysqli_num_rows($result)>0) 
              {
                while ($row=mysqli_fetch_assoc($result))
                {
                  $dp = $row['phone'];
                  $dps = $row['password'];
                  $ds = $row['status'];

                  $_SESSION["id"] = session_id();
                  $_SESSION["s_id"] = $row['id'];  
                  $_SESSION["s_name"] = $row['name'];
                  $_SESSION["s_email"] = $row['email'];
                  $_SESSION["s_phone"] = $row['phone'];
                  $_SESSION["s_password"] = $row['password'];
                  $_SESSION["s_status"] = $row['status'];
                }
                if ($dp == $l_phone && $ds == '1')
                {
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Login Success');
                    window.location.href='services.php';
                  </script>");
                }
                else if($dp == $l_phone && $ds == '2')
                {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Login Success');
                    window.location.href='adminpage.php';
                  </script>");
                }
                else
                {
                  session_destroy();
                  echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Incorrect username/password');
                    window.location.href='login.php';
                    </script>");
                }
                
              }
              else
              {
                echo "<font color='red'><br><br>Invalid user</font>";
              }
            }
          ?>
        </form>
        <label>
          <br>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="container" align="center">
        New? create an <a href="registration.php">account</a>.
      </div>
  </div>

  <div class="bot">
    <div>
      ©2019 AT&T Intellectual Property. All rights reserved.
    </div>
  </div>

</body>
</html>

<?php
  }
?>
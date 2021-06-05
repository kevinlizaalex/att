<?php
	include "include/header.php";
	include("include/dbconnect.php");
  	if(isset($_SESSION["id"])!=session_id())
  	{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='login.php';
      	</script>");
  	}
  	else
  	{
?>
    
<?php
  if(isset($_POST['update']))
  {
    $l_phone = $_SESSION["s_phone"];
    $l_pas = $_POST['pas'];
    $l_npas = $_POST['npas'];
    $l_rnpas = $_POST['rnpas'];
    if($l_npas == $l_rnpas)
    {
      $query = "SELECT * FROM tbl_user WHERE phone = '$l_phone' AND password = '$l_pas'";
      $result = mysqli_query($conn,$query);

      if (mysqli_num_rows($result)>0) 
      {
        while ($row=mysqli_fetch_assoc($result))
        {
          $dr = $row['id'];

            $sql = "UPDATE tbl_user SET password = '$l_npas' WHERE phone = '$l_phone'";
            $re = mysqli_query($conn,$sql);
            echo ("<script LANGUAGE='JavaScript'>window.alert('password succesfully updated');window.location.href='userpage.php';</script>");
          }
        }
          else
          {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Incorrect username/password');window.location.href='login.php';</script>");
          }
        }
    }
   
              
            ?>
          <div class="rr">
            <br>
          <center>
          <h2>• Update password •</h2>
          </center><br><br>
            <form method="post" action="#">
              <label>phone number</label>
              <?php
            $vname = $_SESSION["s_phone"];
            echo "<input type='text' placeholder='' id='name' name='name' maxlength='10' value='$vname' required>";
          ?>
          <label>current passsword</label>
          <input type="password" name="pas">
          <label>new passsword</label>
          <input type="password" name="npas">
          <label>re-enter new passsword</label>
          <input type="password" name="rnpas">
          <center><input type="submit" name="update" value="update"></center>
            </form>
           <br><br><br><br> 
          </div>
      


<table border="1" cellpadding="10">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>

        </tr>
  

<?php
	}
?>
<?php 
    include('include/headeradmin.php');
    $status = $_SESSION["s_status"];
	if(isset($_SESSION["id"])==session_id())
    {
        if ($status == '2'){  
?>

<?php
    if(isset($_POST["submit"]))
    {
      include "include/dbconnect.php";
      $a_op = $_POST["op"];
        if(isset($_POST["submit"]))
        {
            $sql = "INSERT INTO `tbl_plan`(title) VALUES ('$a_op')";
            $res = mysqli_query($conn, $sql);
        }  
    }
  ?>

	<div class="rr">
		<form action="#" method="post">
			<input type="text" name="op" placeholder="Enter plan name">
			<input type="submit" name="submit" value="Add">			
		</form>
		<center><- back to <a href="adminpage.php">admin</a> page?</center>
	</div>

<?php
	global $res;
	if ($res) {
		echo ("<script LANGUAGE='JavaScript'>alert('Plan added succesfully');window.location.href='adminplan.php';</script>");
	}       
?>

<?php
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('This page is accessible only for admin');
            window.location.href='index.php';
            </script>");
        }
    }
    else
    {
      echo ("<script LANGUAGE='JavaScript'>
            window.alert('Please Login or Singnup for further procedure.');
            window.location.href='login.php';
            </script>");
    }
?>
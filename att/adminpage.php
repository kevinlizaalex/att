<?php 
    include('include/headeradmin.php');
    $status = $_SESSION["s_status"];
	if(isset($_SESSION["id"])==session_id())
    {
        if ($status == '2'){  
?>


	<div class="rr">
        <a href="adminuser.php"><input type="button" name="" placeholder="admin" value="show users"></a>
    </div>
    <div class="rr">
		<a href="adminrecharge.php"><input type="button" name="" placeholder="admin" value="recharge history"></a>
	</div>
    <div class="rr">
        <a href="adminport.php"><input type="button" name="" placeholder="admin" value="port requests"></a>
    </div>
    <div class="rr">
        <a href="adminconnection.php"><input type="button" name="" placeholder="admin" value="connection requests"></a>
    </div>
	<div class="rr">
		<a href="adminoffers.php"><input type="button" name="" placeholder="admin" value="add offers"></a>
	</div>
    <div class="rr">
        <a href="adminoperator.php"><input type="button" name="" placeholder="admin" value="add operators"></a>
    </div>
    <div class="rr">
        <a href="adminplan.php"><input type="button" name="" placeholder="admin" value="add plans"></a>
    </div>
    <div class="rr">
        <a href="adminnumber.php"><input type="button" name="" placeholder="admin" value="add numbers"></a>
    </div>
    <div class="rr">
        <a href="adminhelp.php"><input type="button" name="" placeholder="admin" value="add faq"></a>
    </div>
    <br><br><br>




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

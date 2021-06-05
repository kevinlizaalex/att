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
	<div class="rr">
		<center><h2>Hello, 
		<?php
			$num = $_SESSION["s_name"];
			echo $num;
		?>
	...</h2>
	<br>
		<table>

		<?php
                                
            include("include/dbconnect.php");
            
            $uid = $_SESSION["s_id"];
            $sql = "SELECT * FROM tbl_user  where id = $uid";
            $result=mysqli_query($conn,$sql); 
            $rows=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0)
            {
              while ($row =mysqli_fetch_assoc($result))
              {
                echo "<tr>
                		<td>Name : </td>
                		<td>".$row['name']."</td>
                	</tr>
                	<tr>
                		<td>Email : </td>
                		<td>".$row['email']."</td>
                	</tr>
                	<tr>
                		<td>Phone : </td>
                		<td>".$row['phone']."</td>
                	</tr>
                	<tr>
                		<td>Password : </td>
                		<td>".$row['password']."</td>
                	</tr>";
              }
            }
        ?>

    	</table>

      <div class="rn">
        <a href="userupdate.php"><input type="button" name="update" placeholder="inp" value="update password"></a>
      </div>
      <div class="ra">
        <center>
        <h2>• PORT •</h2>
    <br>
    <table border="1" cellpadding="10">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Operator</td>
            <td>Plan</td>
            <td>Reason</td>
            <td>Card name</td>
            <td>Price</td>
            <td>Status</td>
        </tr>
  <?php
                                
            include("include/dbconnect.php");
            $l_viewId= $_SESSION["s_id"];
            $sql = "SELECT * FROM tbl_port WHERE uid = '$l_viewId' ";
            $result=mysqli_query($conn,$sql); 
            $rows=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0)
            {
              while ($row =mysqli_fetch_assoc($result))
              {
                echo "
                    <tr>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['operator']."</td>
                        <td>".$row['plan']."</td>
                        <td>".$row['reason']."</td>
                        <td>".$row['cardname']."</td>
                        <td>".$row['price']."</td>";
                        if($row['status'] == 1)
                        {
                            echo "<td>Pednding</td>";
                        }
                        else if($row['status'] == 2)
                        {
                            echo "<td>Approved</td>";
                        }
                        else if($row['status'] == 0)
                        {
                            echo "<td>Rejected</td>";
                        }
                        else
                        {

                        }

                    "</tr>";
      
              }
            }
        ?>
        </table>
        <br><br>
        back to admin <a href="adminpage.php">home</a>?</center>
        <br><br>
    </div>
    <h2>• RECHARGE •</h2>
    <br>
    <table border="1" cellpadding="10">
        <tr>
            <td>Phone</td>
            <td>Price</td>
            <td>Status</td>
        </tr>
  <?php
                                
            include("include/dbconnect.php");
            $l_viewId= $_SESSION["s_id"];
            $sql = "SELECT * FROM tbl_recharge WHERE uid = '$l_viewId' ";
            $result=mysqli_query($conn,$sql); 
            $rows=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0)
            {
              while ($row =mysqli_fetch_assoc($result))
              {
                echo "
                    <tr>
                        
                        <td>".$row['phone']."</td>
                        
                        <td>".$row['rechargeprice']."</td>";
                        if($row['status'] == 1)
                        {
                            echo "<td>Pednding</td>";
                        }
                        else if($row['status'] == 2)
                        {
                            echo "<td>Approved</td>";
                        }
                        else if($row['status'] == 0)
                        {
                            echo "<td>Rejected</td>";
                        }
                        else
                        {

                        }

                    "</tr>";
      
              }
            }
        ?>
        </table>
        <br><br>
        back to admin <a href="adminpage.php">home</a>?</center>
        <br><br>
    </div>


<?php
	}
?>
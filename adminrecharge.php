<?php 
    include('include/headeradmin.php');
    $status = $_SESSION["s_status"];
	if(isset($_SESSION["id"])==session_id())
    {
        if ($status == '2'){  
?>     
    <br>
    <div class="ra">
        <center>
        <h2>• Recharge History •</h2>
    <br>
    <table border="1" cellpadding="10">
        <tr>
            <td>SL NO</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Recharged number</td>
            <td>Recharge price</td>
        </tr>
	
	<?php
                                
            include("include/dbconnect.php");
            
            $sql = "SELECT * FROM tbl_recharge";
            $result=mysqli_query($conn,$sql); 
            $rows=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0)
            {
              while ($row =mysqli_fetch_assoc($result))
              {
                echo "
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['rechargephone']."</td>
                        <td>".$row['rechargeprice']."</td>
                    </tr>
                    ";
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

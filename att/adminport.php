<?php 
    include('include/headeradmin.php');
    $status = $_SESSION["s_status"];
	if(isset($_SESSION["id"])==session_id())
    {
        if ($status == '2'){  
?>  
    <center>
    <div class="ra">
                <br><h2>Connection requests</h2><br>

    <table border="1" cellpadding="10">
        <tr>
            <td>SL NO</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Operator</td>
            <td>Plan</td>
            <td>Reason</td>
            <td>Status</td>
        </tr>
	
	<?php
                                
            include("include/dbconnect.php");
            
            $sql = "SELECT * FROM tbl_port";
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
                        <td>".$row['operator']."</td>
                        <td>".$row['plan']."</td>
                        <td>".$row['reason']."</td>";
                        if($row['status'] == 1)
                        {
                            echo "<td><form method=post>
                                <button value='".$row['id']."' name=ap>Aprove</button><button value='".$row['id']."' name=re>Reject</button>
                                </form></td>";
                        }
                        else if($row['status'] == 2)
                        {
                            echo "<td><form method=post>
                                <button value='".$row['id']."' name=ap disabled=true>Aprove</button>
                                
                                <button value='".$row['id']."' name=re>Reject</button>
                                </form></td>";
                        }
                        else if($row['status'] == 0)
                        {
                            echo "<td><form method=post>
                                <button value='".$row['id']."' name=ap>Aprove</button>
                                
                                <button value='".$row['id']."' name=re disabled=true>Reject</button>
                                </form></td>";
                        }
                        else
                        {

                        }
                    "</tr>";

              }
            }
        ?>
<?php
    if(isset($_POST['ap']))
    {
        include "include/dbconnect.php";
        $id = $_POST['ap'];
        $sql = "UPDATE `tbl_port` SET `status`= 2 WHERE id = $id";
        $result=mysqli_query($conn,$sql);
        echo "hai";
    }
    if(isset($_POST['re']))
    {
        include "include/dbconnect.php";
        $rid = $_POST['re'];
        $rsql = "UPDATE `tbl_port` SET `status`= 0 WHERE id = $rid";
        $rresult=mysqli_query($conn,$rsql);
        echo "hai";
    }
?>

    </table>
        <br><br>back to admin <a href="adminpage.php">home</a>?<br><br>
</div>
</center>
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

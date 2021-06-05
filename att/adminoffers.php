<?php 
    include('include/headeradmin.php');
    $status = $_SESSION["s_status"];
    if(isset($_SESSION["id"])==session_id())
    {
        if ($status == '2'){  
?>

<?php
    if(isset($_POST["add"]))
    {
      include "include/dbconnect.php";
      $a_price = $_POST["price"];
      $a_description = $_POST["description"];

        if(isset($_POST["add"]))
        {
            $sql = "INSERT INTO tbl_roffer (price,description) VALUES ('$a_price' , '$a_description')";
            $res = mysqli_query($conn, $sql);
        }  
    }
  ?>

    <div class="rr">
        ADD OFFERS
        <br>
        <form action="#" method="post">
            <input type="text" placeholder="price" name="price">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="submit" value="Add" name="add"> 
        </form>
        <center><-<a href="adminpage.php">back</a></center>
    </div>

    <?php
        global $res;
        if ($res) {
        echo ("<script LANGUAGE='JavaScript'>alert('Reharge offer added succesfully.');window.location.href='adminoffers.php';</script>");
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

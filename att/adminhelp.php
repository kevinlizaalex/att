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
      $a_question = $_POST["question"];
      $a_response = $_POST["response"];



        if(isset($_POST["add"]))
        {
            $sql = "INSERT INTO tbl_help (question,response) VALUES ('$a_question' , '$a_response')";
            $res = mysqli_query($conn, $sql);
        }  
    }
  ?>

	<div class="rr">
		ADD OFFERS
        <br>
        <form action="#" method="post">
            
            <textarea name="question" placeholder="Question"></textarea>
            <textarea name="response" placeholder="Response"></textarea>
            <center>
            <input type="submit" value="Add" name="add">
        </form>
        <br><br>back to admin <a href="adminpage.php">home</a>?<br> 
        </center>

    <?php
        global $res;
        if ($res) {
        echo ("<script LANGUAGE='JavaScript'>alert('Account successfully created');window.location.href='adminhelp.php';</script>");
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
    </div>
<div class="bot">
        <div>
            ©2019 AT&T Intellectual Property. All rights reserved.
        </div>
    </div>
    </body>
</html>
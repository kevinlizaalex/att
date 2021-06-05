<?php
  include("include/header.php");
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

	<div class="middle">
		<div class="middle_up">
			<div class="middle_up_left">
				<br/>
				<font size="60px">Join <br></font>
				<font color="#33beff" size="60px">AT&T</font><br><br>
				<img src="images/sim.png" height="150px"><br>
			</div>

			<div class="middle_up_right">	
				<form name="new" action="paymentconnection.php" method="post">
					<label>Name</label>
<?php
	$vname = $_SESSION["s_name"];
	echo "<input type='text' placeholder='' id='name' name='name' maxlength='10' value='$vname' required>";
?>
					<label>Email</label>
<?php
	$vemail = $_SESSION["s_email"];
	echo "<input type='text' placeholder='' onblur='validateEmail(this.value)'' name='email' value='$vemail' required>";
?>
					<label>Preffered number</label>
					<div class="box">
						<select class="operators" name="num" required>
							<option selected disabled>select number</option>

<?php
  include("include/dbconnect.php");
  $sql ="SELECT * FROM tbl_number";
  $result=mysqli_query($conn,$sql); 
  $rows=mysqli_num_rows($result);
  if(mysqli_num_rows($result)>0)
  {
    while ($row =mysqli_fetch_assoc($result))
    {
      echo "<option value=".$row['phno'].">".$row['phno']."</option>";
    }
  }
?> 

        				</select>
					</div>
					<label>Choose a plan</label>
					<div class="box">
						<select class="operators" name="plan" required>
							<option selected disabled>select plan</option>

<?php
  include("include/dbconnect.php");
  $sql ="SELECT * FROM tbl_plan";
  $result=mysqli_query($conn,$sql); 
  $rows=mysqli_num_rows($result);
  if(mysqli_num_rows($result)>0)
  {
    while ($row =mysqli_fetch_assoc($result))
    {
      echo "<option value=".$row['title'].">".$row['title']."</option>";
    }
  }
?> 

        				</select>
					</div>
					<input type="submit" value="Apply" name="apply">
				</form>
			</div>



		</div>
	</div>

	<?php
	    global $res;
	    if ($res)
	    {
	    	echo ("<script LANGUAGE='JavaScript'>alert('Connection request succesfully submitted');window.location.href='services.php';</script>");
    	}      
  	?>

	<br>
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
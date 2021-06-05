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
				<font size="60px">Number <br></font>
				<font color="#33beff">Porting</font><br><br>
				<img src="images/sim.png">
			</div>
				
			<div class="middle_up_right">
				<form name="new" action="paymentport.php" method="post">
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
          
          <label>Number</label>
          
          <?php
            $vnumber = $_SESSION["s_phone"];
            echo "<input type='text' placeholder='' id='mobile' name='phone' onkeypress='return isNumberKey(event)' maxlength='10' value='$vnumber' required>";
          ?>
          <label>Current operator</label>
					<div class="box">
						<select class="operator" name="operator" required>
							<option selected disabled>select operator</option>

<?php
  include("include/dbconnect.php");
  $sql ="SELECT * FROM tbl_operator";
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
          <label>Activation plan</label>
					<div class="box">
						<select class="plan" name="plan" required>
							<option selected disabled>select new plan</option>

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
          <label>Reason</label>
					<div class="sample">
						<textarea placeholder="" name="reason"></textarea>
					</div>
					<input type="submit" name="portt" value="portt" >
				</form>
			</div>
		</div>
	</div>

  <?php
    //global $res;
    //if ($res)
    //{
    //  echo ("<script LANGUAGE='JavaScript'>alert('Port request succesfully submitted');window.location.href='services.php';</script>");
    //}      
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
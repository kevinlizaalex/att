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
<?php
	function setnum()
	{
		 echo ("<script LANGUAGE='JavaScript'>
        window.alert('You have already logined.');

      </script>");
		$_SESSION["fnu"] = $_GET["mobile"];
		$f= $_SESSION["fnu"];
		echo $f;
	}
?>

	<div class="middle">
		<div class="middle_up">
			<div class="middle_up_left">
				<br/>
				<font size="60px">Recharge <br></font>
				<font color="#33beff">Mobile</font><br><br>
				<img src="images/sim.png">
			</div>
				
			<div class="middle_up_right">
		          <label>Your number</label>
		          <form action="#" method="get">
		          	<input type='text' placeholder='Mobile' name='mobile' onkeypress='return isNumberKey(event)' maxlength='10'  required>
					<button name="fnum" onclick="setnum()">Confirm</button>
		          </form>
				<div class="row">

	<?php
		include("include/dbconnect.php");
		$sql ="SELECT * FROM tbl_roffer";
		$result=mysqli_query($conn,$sql); 
		$rows=mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
        	while ($row =mysqli_fetch_assoc($result))
        	{
        		echo "<div class='card'>
        		<h1>₹".$row['price']."</h1>
        		<p><br>".$row['description']."<br></p>
				<p><form action='paymentrecharge.php' method='get' enctype='multipart/form-data'><button name='solved' value='".$row['price']."'>Buy</button></form></p>
				</div>";
			}
        }
    ?>

				</div>
			</div>
		</div>
	</div>
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
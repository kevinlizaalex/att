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
				<font size="60px">Bordband <br></font>
				<font color="#33beff" size="60px">Plan</font> <br>
				<img src="images/broadband.png" height="150px"><br>
			</div>

			<div class="middle_up_right">
				<form action="bordbandoffers.php">
					<?php
						$num = $_SESSION["s_phone"];
						echo "<input type='text' placeholder='Mobile' id='mobile' value='$num' name='mobile' onkeypress='return isNumberKey(event)' maxlength='10' required>";
					?>
				</form>
			

				<div class="row">

	<?php
		include("include/dbconnect.php");
		$sql ="SELECT * FROM `tbl_boffer`";
		$result=mysqli_query($conn,$sql); 
		$rows=mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
        	while ($row =mysqli_fetch_assoc($result))
        	{
        		echo "<div class='card'>
        		<h1>₹".$row['price']."</h1>
        		<p><br>".$row['description']."<br></p>
				<p><a href='payment.php'><button>BUY</button></a></p>
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
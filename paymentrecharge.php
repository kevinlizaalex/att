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
    $rate = $_GET['solved'];
    $_SESSION["s_orate"] = $rate;

    if(isset($_POST["pay"]))
    {
      include "include/dbconnect.php";
      $r_cname = $_POST["cardname"];
      $r_cno = $_POST["cardnumber"];
      $r_cmonth = $_POST["month"];
      $r_cyear = $_POST["year"];

      $r_uid = $_SESSION["s_id"];
      $r_uname = $_SESSION["s_name"];
      $r_uemail = $_SESSION["s_email"];
      $r_uphone = $_SESSION["s_phone"];
      global $rate;
      $sql = "INSERT INTO tbl_recharge(uid, name, email, phone, rechargephone, cardname, cardno, validmonth, validyear, rechargeprice) VALUES ('$r_uid','$r_uname','$r_uemail','$r_uphone','$r_uphone','$r_cname','$r_cno','$r_cmonth','$r_cyear','$rate')";    
      $res = mysqli_query($conn, $sql);
      
    }
  ?>

	<div class="rw">
			<form action="#" method="post">
        <div class="orate">
          <font color="grey">  Total amount : </font><font color="red" size="5">₹
<?php
  echo $_SESSION["s_orate"];
?>
          </font>
        </div>
        <br><br>
				<label for="fname">accepted Cards</label>
			<div class="icon-container">
				<i class="fa fa-cc-visa" style="color:navy;"></i>
				<i class="fa fa-cc-amex" style="color:blue;"></i>
				<i class="fa fa-cc-mastercard" style="color:red;"></i>
				<i class="fa fa-cc-discover" style="color:orange;"></i>
			</div>
			<input type="text" name="cardname" placeholder="card name" required>
			<input type="text" name="cardnumber" placeholder="card number" maxlength="16" onkeypress="return isNumberKey(event)" required>
			<div class="box">
				<select class="operators" name="month" required>
					<option selected disabled>select expiry month</option>
			   		<option value="1">January</option>
   		 			<option value="2">February</option>
   					<option value="3">March</option>
    				<option value="4">April</option>
   					<option value="5">May</option>
   					<option value="6">June</option>
   					<option value="7">July</option>
   					<option value="8">August</option>
   					<option value="9">September</option>
   					<option value="10">October</option>
   					<option value="11">November</option>
   					<option value="12">December</option>
				</select>
			</div>
			<div class="box">
				<select class="operators" name="year" required>
					<option selected disabled>select expiry year</option>
			   		<option value="1">2019</option>
   		 			<option value="2">2020</option>
   					<option value="3">2021</option>
    				<option value="4">2022</option>
   					<option value="5">2023</option>
   					<option value="6">2024</option>
   					<option value="7">2025</option>
				</select>
			</div>
			<input type="text" name="cvv" placeholder="cvv" maxlength="3" onkeypress="return isNumberKey(event)" required>
			<center><input type="submit" value="Pay" name="pay"></center>
			</form>

<?php
    global $res;
    if ($res)
    {
    	echo ("<script LANGUAGE='JavaScript'>window.location.href='paymentsuccesful.php';</script>");
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
<?php
	}
?>
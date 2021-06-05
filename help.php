<?php
  include("include/header.php");
?>

  <div class="accr">
    
<?php                                
  include("include/dbconnect.php");
  $sql ="SELECT * FROM tbl_help";
  $result=mysqli_query($conn,$sql); 
  $rows=mysqli_num_rows($result);
  $sql = $sql . " order by id";
  if(mysqli_num_rows($result)>0)
  {
    while ($row =mysqli_fetch_assoc($result))
    {
    echo "<button class='accordion'>".$row['question']."</button>
          <div class='panel'>
          <p>".$row['response']."</p>
          </div>
          <hr>";      
    }
  }
?>      

    </div>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
  }
</script>

  <div class="bot">
    <div>
      ©2019 AT&T Intellectual Property. All rights reserved.
    </div>
  </div>
</body>
</html>
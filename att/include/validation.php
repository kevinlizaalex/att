<script>
	function isNumberKey(evt)
    {
    	var charCode = (evt.which) ? evt.which : event.keyCode
    	if (charCode > 31 && (charCode < 48 || charCode > 57))
    		return false;
    	return true;
    }

	function validateEmail(sEmail) 
		{
			var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
			if(!sEmail.match(reEmail)) 
			{
				alert("Invalid email address");
				return false;
			}
			return true;
		}



    	function check()
    {
      var n = document.forms["regform"]["name"].value;
      var e = document.forms["regform"]["email"].value;
      var p = document.forms["regform"]["phone"].value;
      var u = document.forms["regform"]["username"].value;
      var ps = document.forms["regform"]["password"].value;
      var rps = document.forms["regform"]["rpassword"].value;
    
      if((n == "")||(e =="")||(p == "")||(u == "")||(ps == "")||(rps == ""))
      {
        alert("Fill");
        return false;
      }
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(regform.email.value))
      {
        return (true)
      }
      alert("You have entered an invalid email address!")
      return (false)
    }
    function isNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "none";
  } else {
    x.style.display = "none";
  }
}
</script>
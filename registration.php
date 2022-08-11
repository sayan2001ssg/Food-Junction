<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="registration2.css">
<body>
<h1 style="text-align: center; font-size: 50px;"> Welcome to Food Junction!! </h1>
<br>
<br>
<br>
<br>
<div style="float:left; margin-left: 400px;">
    <h2>Registration Form</h2>
    <button  onclick="document.getElementById('id01').style.display='block'" style="width:auto; margin-left:55px;">Register</button>
  </div>
  <div style="float: right; margin-right: 400px;">
    <h2>Already registered?</h2>

    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; margin-left: 50px;">Login</button>
  </div>

<script type="text/javascript">
  function check()
  {
    if (document.getElementById('psw').value == document.getElementById('psw-repeat').value) 
    {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = "";
    } 
    else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Your password and repeat password are not same';
    }
  }

</script>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="registration.php" method="post">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>


      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
      <label for="psw-repeat" style="margin-right: 10px;"><b>Repeat Password</b></label> <span id='message'></span>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat"  onkeyup='check();' required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
        <button type="submit" class="signupbtn" name="register">Register</button>
      </div>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="registration.php" method="post">

    <div class="container">
      <label for="useremail"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="useremail" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pasw" required>
        
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
var modal1 = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  else{
   if (event.target == modal1) {
    modal1.style.display = "none";
  } 
  }
}
</script>

</body>
</html>

<?php
if (isset($_POST['register'])) {

	$con = mysqli_connect("localhost","root","","foodjunc");
	$txtEmail = $_POST['email'];
	$txtPassword = $_POST['psw'];
	$txtRpassword=$_POST['psw-repeat'];

	if(!($con))
	{
		die("Error in connecting to database");
	} 
         
  else
	{
		$query="SELECT * FROM register WHERE Email='$txtEmail' ";
		$run=mysqli_query($con,$query);
		if(mysqli_num_rows($run)>0)
		{
			echo "<script src='message1.js'></script>";
		}
		else
		{
      if($txtPassword==$txtRpassword)
      {
        $sql = "INSERT INTO `register` (`Id`, `Email`, `Password`,`Rpassword`) VALUES ('0','$txtEmail', '$txtPassword','$txtRpassword')";   
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
          echo "<script src='message2.js'></script>";
        } 
      }

      else
			{
				echo"<script src='message6.js'></script>";
			}
		}
	}

}
if (isset($_POST['login'])) 
{
	$conn = mysqli_connect("localhost","root","","foodjunc");
	$txtEmail = $_POST['useremail'];
	$txtPassword = $_POST['pasw'];

	if(!($conn))
	{
		die("Error in connecting to database");
	}

	else
	{
		$query="SELECT * FROM register WHERE Email='$txtEmail'";
		$run=mysqli_query($conn,$query);
		if(mysqli_num_rows($run)==0)
		{
			echo "<script src='message4.js'></script>";
		}
		else
		{
        $query="SELECT * FROM register WHERE Email='$txtEmail' and Password='$txtPassword'";
        $run=mysqli_query($conn,$query);
        if(mysqli_num_rows($run)==1)
        {
          echo "<script src='message3.js'></script>";
        }
        else{
          echo"<script src='message5.js'></script>";
        }	
		}
	}
}

?>
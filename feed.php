<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Feedback </title>
	<link rel="stylesheet" type="text/css" href="feedback1.css">
</head>
<body>
	<div class="hero">
		<form class="feed" action="feed.php" method="post">
			<div class="feed_act">
				<h1> Feedback Section!!</h1>
				<p>Please fill this form to send your valuable feedback.</p>
				<hr>
				<label for="name"><b>Name</b></label><br>
				<input type="text" placeholder="Enter your name" name="txtName" required><br>

				<label for="email"><b>Email</b></label><br>
				<input type="email" placeholder="Enter your email" name="txtEmail" required><br>

				<label for="message" ><b>Message</b></label> <br>
				<textarea name="txtMessage" cols="40" rows="3" placeholder="Please enter your feedback" required></textarea><br>

				<button type="submit" class="sub" name="submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {

	$con = mysqli_connect("localhost","root","","foodjunc");
	$txtName = $_POST['txtName'];
	$txtEmail = $_POST['txtEmail'];
	$txtMessage = $_POST['txtMessage'];

	if(!($con))
	{
		die("Error in connecting to database");
	}

	else
	{
		$sql = "INSERT INTO `feedback` (`Id`, `Name`, `Email`, `Message`) VALUES ('0', '$txtName', '$txtEmail', '$txtMessage')";
		$rs = mysqli_query($con, $sql);
		if($rs)
		{
			echo "<script src='message.js'></script>";
		}
		else
		{
			echo"Try again";
		}
	}
}

?>

<?php 
	require "functions.php";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = addslashes($_POST['username']);
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);
		$date = date('Y-m-d H:i:s');

		$query = "insert into users (username,email,password,date) values ('$username','$email','$password','$date')";

		$result = mysqli_query($con,$query);

		header("Location: copy_login.php");
		die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/icon.png">
  <title>UniQue - Signup</title>
  <link rel="stylesheet" href="css/loginstyle.css">

</head>

<body>
  
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      
      <input type="text" name="username" required placeholder="Username">

      <input type="email" name="email" required placeholder="Email">

      <input type="text" name="password" required placeholder="Password">


      <label for="user_type">Select user type:</label>
      <select name="user_type" id="user_type" disabled>
         <option value="user">User</option>
         <option value="admin">Admin</option>
         
      </select>

      <input class="form-btn" type="submit" name="submit" value="register now" >

      <p>already have an account? <a href="copy_logIn.php">login now</a></p>
      
   </form>

</div>

</body>
</html>
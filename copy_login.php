<?php 

	require "functions.php";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);

		$query = "select * from users where email = '$email' && password = '$password' limit 1";

		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0){

			$row = mysqli_fetch_assoc($result);

            if($row['user_type'] == 'admin'){

                $_SESSION['info'] = $row;
                header('location:admin-dashboard-page.php');
                die;
       
             }elseif($row['user_type'] == 'user'){
       
                $_SESSION['info'] = $row;
                header('location:copy_index.php');
                die;
       
             }

			// $_SESSION['info'] = $row;
			// header("Location: copy_index.php");
			// die;

		}else{
			$error = "wrong email or password";
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="image/icon.png">
   <title>Uni Que - Login</title>
   <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
  
<div class="form-container">

    <form action="" method="post">
            <h3>login</h3>
                <?php 
                    if(!empty($error)){
                        echo "<div>".$error."</div>";
                    }
                ?>
        <input type="email" name="email" required placeholder="Email">

        <input type="password" name="password" required placeholder="Password">

        <input type="submit" name="submit" value="login now" class="form-btn">

        <p>Don't have an account? <a href="copy_signup.php">Register now</a></p>
    </form>

</div>

</body>
</html>
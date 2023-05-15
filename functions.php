<?php 

require "connection.php";


function check_login()
{
	if(empty($_SESSION['info'])){

		header("Location: login.php");
		die;
	}
}


if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['post']))
	{
		//adding post
		$image = "";
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"){
			//file was uploaded
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
 
		}

		$title_post = addslashes($_POST['title_post']);
		$tag = addslashes($_POST['tag']);
		$post = addslashes($_POST['post']);
		$user_id = $_SESSION['info']['id'];
		$date = date('Y-m-d H:i:s');

		$query = "insert into posts (user_id,title_post,post,image,tag,date) values ('$user_id','$title_post','$post','$image','$tag','$date')";

		$result = mysqli_query($con,$query);
 
		header("Location: ask_question.php");
		die;
	}
<?php 

require "connection.php";


function check_login()
{
	if(empty($_SESSION['info'])){

		header("Location: copy_login.php");
		die;
	}
}

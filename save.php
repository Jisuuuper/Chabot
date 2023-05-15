<?php
include 'conn.php';
$id = $_POST['id'];
$name = $_POST['name'];
$msg = $_POST['msg'];
$post_id = $_POST['parent_post'];
if($name != "" && $msg != ""){
	$sql = $conn->query("INSERT INTO forum (parent_post, parent_comment, student, post)
			VALUES ('$post_id', '$id', '$name', '$msg')");
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

?>
<?php
/*
function upload_image(){
	if(isset($_FILES["user_image"])){
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}
*/


function get_total_all_records(){
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM jobs WHERE taxi_comp='14'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
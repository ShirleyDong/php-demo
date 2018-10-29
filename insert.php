<?php
	$con  =  mysqli_connect('cs1.ucc.ie','td11','fou0Chah','mscim2018_td11');
	
	$id = $_POST["book_id"];
	$name = $_POST["title"];
	$page = $_POST["pages"];
	
	$sql = "INSERT INTO books (book_id, title, pages) VALUES ('$id', '$name', '$page')";
	
	if(!mysqli_query($con, $sql))
	{
		echo 'Not Inserted, this id is already exit';
	}
	else
	{
		echo 'Inserted please wait for 2 seconds...';
	}
	
	header("refresh: 2; url = index.html");

?>
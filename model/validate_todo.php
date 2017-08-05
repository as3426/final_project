<?php
//simple php file to check if title is empty

$title=$_GET['title'];

if(!isset($title) || $title==null || $title=="")
{
//title empty - create error message
	$error_msg="Title cannot be empty";
        header("Location:./create_todo.php?error_msg=".$error_msg);
	}
	else
	{
	//title valid- move to next page of adding items
	header("Location:./add_todo.php?title=".$title);
	}
	?>




<?php
//get the id of todo list and call the delete method from todo_db.php
require_once('todo_db.php');
$id=$_GET['id'];
delete_todo($id);
header("Location: ../index.php");
?>

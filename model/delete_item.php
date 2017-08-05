<?php 
require_once('todo_db.php');
require_once('Todo.php');
//get the row id and item name from edit_todo table and call delete method from todo_db.php
$id=$_GET['todo_id'];
$item_id=$_GET['item_id'];
delete_item($id,$item_id);
//after deletion of item  redirect to index.php
header("Location: ../index.php");
?>

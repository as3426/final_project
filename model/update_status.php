<?php
//php file to update item status using update_status method from todo_db.php
require_once('todo_db.php');
$status=$_GET['status'];
$item_id=$_GET['item_id'];
update_status($status,$item_id);
header("Location: ../index.php");
?>

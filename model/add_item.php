<?php
//get the newitem and list id values and call the add_item method from todo_db.php
require_once('todo_db.php');
$newitem=$_GET['newitem'];
$listid=$_GET['listid'];
add_item($newitem,$listid);


header("Location: ../index.php");
?>

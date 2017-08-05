<?php
//calls updateTodoTitle method from todo_db.php and passes the list id and title value
require_once('todo_db.php');
require_once('Todo.php');
$id=$_GET['title_id'];
$title=$_GET['title'];
updateTodoTitle($id,$title);
//after updation redirect toindex.php

header("Location: ../index.php");
?>

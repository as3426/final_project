<html>
<head>
<title> TO DO List</title>
<?php require_once('model/Database.php');
require_once('model/Todo.php');
require_once('model/todo_db.php');
?>

<link rel="stylesheet" type="text/css"  href="/~as3426/final_project/main.css">

</head>
<body>
<h1> TO DO List- Homepage</h1>

<!-- form to create a new todo list -->
<form action="model/create_todo.php" method="get">
<input type="submit" value="CREATE NEW TO DO LIST"/>
</form>
<p><h2> Previously created list(s)</h2></p>
<!-- php code to display data from previously created todo lists -->
<?php


$todo_array=getTodoLists();
?>
<table> 
<tr>

	<th> List Title</th>
	<th>Items</th>
	<th>Status</th>
	<th>Delete</th>
	<th>Edit</th>
</tr>	
<!-- create a row for each todo list -->
<?php foreach($todo_array as $todo)
{ ?>

<tr>
<!--	<td> 
	<?php // echo $todo->getTodo_list_id();?>
	</td>
-->	
	<td>
	<?php echo $todo->getTitle(); ?>
	</td>
	<td>
	<?php
	foreach($todo->getItems() as $item)
	{
	echo $item.'<br/>';
	}?>
	</td>
	<td>
	<?php foreach($todo->getStatus_array() as $status)
	{
		echo $status.'<br/>';
	}
	?>
	</td>
	<td>
	<a href="model/delete_todo.php?id=<?php echo $todo->getTodo_list_id(); ?>">Delete</a>
	
	</td>
	<td>

	 <a href="model/edit_todo.php?id=<?php echo $todo->getTodo_list_id(); ?>">Edit/Update</a>

	</td>
</tr>	

<?php } ?>
</table>

</body>
<?php include('view/footer.php'); ?>
</html>

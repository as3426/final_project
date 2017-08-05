<?php
require_once('todo_db.php');
require_once('Todo.php');
$id=$_GET['id'];
?>
<html>
<head>
<title> edit or update</title>

<link rel="stylesheet" type="text/css"  href="/~as3426/final_project/main.css">

</head>
<body>
<?php $todo=getTodoById($id);
?>
<br/>
<h1>Update/Edit the list</h1>

<table style="align:center; height=300px;">
<tr><td>
<form action="update_title.php" method="get">
title:<input type="text" name="title" required="true" value="<?php echo $todo->getTitle(); ?>"/>
<input type="hidden" name="title_id" value="<?php echo $todo->getTodo_list_id(); ?>"/>
<input type="submit" value="Update title"/>
</form>
</tr></td></table>

<table>
<th> Item</th><th> Delete</th><th>Change completion Status(pending/complete)*</th><th>Change item** </th>

<h4>
<?php 
//Corresponding to the specific list- extract the items, row id for each item, status of each item
$todo_item_array=$todo->getItems();
$todo_rowid=$todo->getRowid_array();
$todo_status_array=$todo->getStatus_array();
$ctr=0;
foreach($todo_item_array as $item)
{?>

<tr><td>
<!-- display item name -->
<?php echo $item; ?></td><td>
<!--link to delete thsi item -->
<a href="delete_item.php?todo_id=<?php echo $todo->getTodo_list_id(); ?>&item_id=<?php echo $todo_rowid[$ctr];
 ?>">Delete</a>
 </td><td>

 <!-- link to change completin status of this item -->
<a href="update_status.php?status=<?php echo $todo_status_array[$ctr]; ?>&item_id=<?php echo $todo_rowid[$ctr];
 ?>">Toggle completion status</a>
  </td><td>
  <!-- form to update the name of this item -->
  <form action="change_item_name.php" method="get">
New Name:  <input type="text" name="item_name" />
<br/><br/><input type="hidden" name="item_id" value="<?php echo $todo_rowid[$ctr] ?>"/>
 <input type="submit" value="update item name"/>
 </form>
 
  &nbsp;&nbsp;</td></tr>

 <br/>

 <?php $ctr++;
 } ?>
 </h4>
</table>
<table>
<tr><td>
<h2> Add an item to this list</h2>
<br/>
<!-- form to add a new item to the list -->
<form action="add_item.php" method="get">
item name:<input type="text" name="newitem"/>
<input type="hidden" name="listid" value="<?php echo $todo->getTodo_list_id(); ?>"/>
<input type="submit" value="Add Item"/>
</form>
</td></tr>
</table>
*'Toggle completion status' will change the status to 'complete' if its currently 'pending' & vice-versa.
<br/>
**Item name updation will only happen when 'update item name' button is clicked.

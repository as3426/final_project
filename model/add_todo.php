<?php session_start(); ?>
<html>
<head>
<title> Add Items</title>
<?php require_once('Todo.php');
require_once('todo_db.php');
?>
</head>

<body>

<link rel="stylesheet" type="text/css"  href="/~as3426/final_project/main.css">
<br/><br/><br/>
<br/><br/><br/>
<h1>Step 2: Add Items</h1>
<h2><?php
//GLOBALS['add_todo_error']="";


  $title=$_SESSION['title'];
  $item_array=$_SESSION['item_array'];
//finish: add data to db and redirect to index page
if(isset($_GET['finish']))
{	

	add_todo_obj_in_db($title,$item_array);	
	session_destroy();
	header("Location: /~as3426/final_project/index.php");
}

          
         $todo=new Todo(); 	

	if(!empty($_GET['title']))
	{
	
		$_SESSION['title']=$_GET['title'];
	}

	$todo->setTitle($_SESSION['title']);
	echo "title:".$todo->getTitle();
       //CLEAR LIST:clear the list
       if(isset($_GET['Clear_List']))
       {
       			
                unset($_SESSION['item_array']);
		$_GET['item']=null;
		}



	if (empty($item_array))
	{ $item_array=array(); }
	
	$todo->setItems(item_array);


//	$todo->setTitle($_GET['$title']);
	
	
	if (!empty($_GET['item']))
	{
		if (empty($todo->getTitle()))
		{
	//	$_GLOBALS['add_todo_error']="Title not set";
			
		}

		else
		{
		array_push($item_array,$_GET['item']);
		$todo->setItems($item_array);
		
		$_SESSION['item_array']=$item_array;
		echo '<br/>'."Added: ";
		
		foreach($item_array as $it)
		{
			echo '<i>'.$it.'</i>,';
		}
		}
	}
	


?></h2>
<table style="height:300px;align:center;"><tr><td>
<form action="add_todo.php" method="get">
Item: <input type="text" name="item" required="required">
<input type="submit" value="Add Item" name="Add_Item"/>
<input type="submit" value="Clear List" name="Clear_List" formnovalidate/>
<input type="submit" value="Finish" name="finish" formnovalidate/>
<a href="../index.php"> Go to Homepage</a>
</form>
</td></tr></table>
</body>
</html>



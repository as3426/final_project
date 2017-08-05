<html>
<head>

<link rel="stylesheet" type="text/css"  href="/~as3426/final_project/main.css">

</head>
<!-- this page will only display if error occurs -->
<body class="error">
<br/> <br/>
<!-- todo_db has all the database realted functions -->
<?php
require_once('todo_db.php');
$itemid=$_GET['item_id'];
$item=$_GET['item_name'];
$err="";
if(!empty($itemid))
{
	if(!empty($item))
	{
		//if item id and name are non empty,call DB function to update name and redirect to index.php
		changeItemName($itemid,$item);
		header("Location: ../index.php");
	}

	else{

		echo "Error: Item name cannot be empty";
		
	}
	
}
else
{
	echo "item name cannot be empty";
}

?>
<br/><br/>
<a href="../index.php">Go Back to Homepage</a>
</body>
</html>


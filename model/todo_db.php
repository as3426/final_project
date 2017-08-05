<?php
require_once('Database.php');
require_once('Todo.php');
//this class has all the DB related methods

//get all the lists from db
     function getTodoLists() {


       $db = Database::getDB();
        $query = 'SELECT *  FROM todo
                  ORDER BY todo_list_id';
        $statement = $db->prepare($query);
	$statement->execute();
	$result=$statement->fetchAll();
	$statement->closeCursor();
        $todo_array=array();
        foreach ($result as $row) {
      
	   $todo = new Todo();
           $todo->setTodo_list_id($row['todo_list_id']);
	   $todo->setTitle($row['title']);
	  	   $todo->setItems(getTodoListItems($todo->getTodo_list_id()));
	$todo->setStatus_array(getTodoItemsStatus($todo->getTodo_list_id()));   
	   array_push($todo_array,$todo);
        }
	
        return $todo_array;
  }

//get todo list based on the todo list id passed to it
function getTodoById($id)
{
	$db=Database::getDB();
	$q="select * from todo where todo_list_id=".$id;
	$stmt=$db->prepare($q);
	$stmt->execute();
	$res=$stmt->fetchAll();
	$stmt->closeCursor();
	$todo=new Todo();
//populate the fields of todo object
	foreach($res as $row)
	{
		$todo->setTitle($row['title']);
		$todo->setTodo_list_id($row['todo_list_id']);
		$todo->setItems(getTodoListItems($todo->getTodo_list_id()));
		$todo->setStatus_array(getTodoItemsStatus($todo->getTodo_list_id()));

		$todo->setRowid_array(getTodoItemsRowId($todo->getTodo_list_id()));
	}
	return $todo;
}

//get the items array for a specific list based on todo list id for that list
      function getTodoListItems($todo_list_id) {
        $db = Database::getDB();
	
        $query = "SELECT *  FROM todo_list_items
                  WHERE todo_list_id=".$todo_list_id." order by rowid";
      
      $statement = $db->prepare($query);


	$statement->execute();
        $result=$statement->fetchAll();
	$statement->closeCursor();
	$items_array=array();
	foreach($result as $row)
	{

        array_push($items_array,$row['item']);
	}
	return $items_array;
   	 
	}

//get the status of each item in a specific todo list(based on todo list id fo it)
	function getTodoItemsStatus($todo_list_id)
	{
		$db=Database::getDB();
		$q="select * from todo_list_items where todo_list_id=".$todo_list_id." order by rowid";
		$stmt=$db->prepare($q);
		$stmt->execute();
		$res=$stmt->fetchAll();
		$stmt->closeCursor();
		//the status values will be put in an array ordered by rowid
		$status_array=array();
		foreach($res as $row)
		{
			array_push($status_array,$row['status']);
		}
		return $status_array;
	}

//get the array of row IDs for all items in a specific list (nased on the todo list id)
	function getTodoItemsRowId($todo_list_id)
	{
		$db=Database::getDB();
		 $q="select * from todo_list_items where todo_list_id=".$todo_list_id." order by rowid";
 			$stmt=$db->prepare($q);
			 $stmt->execute();
	                 $res=$stmt->fetchAll();
			  $stmt->closeCursor();
			  $rowid_array=array();
			foreach($res as $row)
		 {
		         array_push($rowid_array,$row['rowid']);
		  }
			        return $rowid_array;


	}

//update the list title in todo table based on todo list id
	function updateTodoTitle($id,$title)
	{
 	  $db=Database::getDB();
          $q="update todo set title='".$title."' where todo_list_id=".$id;
	  $stmt=$db->prepare($q);
	  $stmt->execute();
		$stmt->closeCursor();		                     
	}

//add a new todo list to DB
function add_todo_obj_in_db($title,$item_array)
{
	$db=Database::getDB();
	$query="insert into todo(title) values('".$title."')";
	$statement=$db->prepare($query);
	$statement->execute();
	
	$statement->closeCursor();
	$id_generated=$db->lastInsertId();
	foreach($item_array as $item)
	{
		$query2="insert into todo_list_items(todo_list_id,item) values(".$id_generated.",'".$item."')";
		$statement2=$db->prepare($query2);
		$statement2->execute();
		$statement2->closeCursor();
	}

}
//delete a todo list based on its todo list id
//delete data for that list from both tables- todo and todo_list_items
function delete_todo($id)
{
	$db=Database::getDB();
	$q="delete from todo where todo_list_id=".$id;
	$stmt=$db->prepare($q);
	$stmt->execute();
	$stmt->closeCursor();
	$q2="delete from todo_list_items where todo_list_id=".$id;
	$stmt2=$db->prepare($q2);
	$stmt2->execute();
	$stmt2->closeCursor();
}

//delete one item from the todo_list_items table 
function delete_item($id,$itemid)
{
        $db=Database::getDB();
	$q="delete from todo_list_items where todo_list_id=".$id." and rowid=".$itemid;
	$st=$db->prepare($q);
	$st->execute();
	$st->closeCursor();

}
//change the completetion status of an item on the list
function update_status($status,$itemid)
{
	$db=Database::getDB();
	$t=null;
	if($status=="pending")
	{
		$t="complete";
	}
	else
	{
		$t="pending";
	}

	$q="update todo_list_items set status='".$t."' where rowid=".$itemid;
	$st=$db->prepare($q);
	$st->execute();
	$st->closeCursor();
}
//add item to a specific list
function add_item($item,$listid)
{
	$db=Database::getDB();
	$q="insert into todo_list_items(item,todo_list_id) values('".$item."',".$listid.")";
	$st=$db->prepare($q);
	$st->execute();
	$st->closeCursor();
	
}
//update item name in a specific list
function changeItemName($itemid,$item)
{
	$db=Database::getDB();
	$q="update todo_list_items set item='".$item."' where rowid=".$itemid;
	$st=$db->prepare($q);
	$st->execute();
	$st->closeCursor();
}
?>

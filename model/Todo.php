<?php 
//the moel class for a to do list
class Todo
{
//class properties
private $todo_list_id;//identifies a list uniquely
private $items;//array of items in list sorted by its row id in DB
private $title;//list title
private $status_array; //array of item completion status sorted by its row id in db
private $rowid_array;
/*array of row id- uniquley identifies each row in table containing all items from all
lists. array is sorted in ascending order*/

public function __construct()
{
$this->todo_list_id=0;
$this->items=array();
$this->title=null;
$status_array=array();
$rowid_array=array();
}


public function getRowid_array()
{
	return $this->rowid_array;
}

public function setRowid_array($arr)
{
	$this->rowid_array=$arr;
}
public function getStatus_array()
{
	return $this->status_array;
}
public function setStatus_array($arr)
{
	$this->status_array=$arr;
}

public function getItems()
{
return $this->items;
}

public function getTitle()
{

return $this->title;
}

public function getTodo_list_id()
{
return $this->todo_list_id;
}

public function setTitle($title)
{
$this->title=$title;
}

public  function setTodo_list_id($id)
{
	$this->todo_list_id=$id;

}

public function setItem($item)
{
array_push($this->items,$item);
}
public function setItems($items)
{
	$this->items=$items;
}

}
?>


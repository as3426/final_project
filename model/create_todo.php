

<html>
<head>
<title>Create Todo</title>
</head>

<link rel="stylesheet" type="text/css"  href="/~as3426/final_project/main.css">
<!-- the first step of creating a new list -->
<body>
 <br/> </br> </br>
<br/><br/> <br/>
<h1>Step 1: Add a title</h1>
<div class="error">
<?php

$msg=$_GET['error_msg'];
echo $msg;
?>
</div>

<table style="height:200px;">
<tr> <td style="text-align:center;align:center;">
<!-- form to check if title is non-empty string-->
<form action="validate_todo.php" method="get">
Title:<input type="text" name="title"/>
<input type="submit" value="Next>>"/>
</td></tr>
</table>
</form>
</body>
</html>

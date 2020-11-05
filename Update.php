<?php
require("dbconnect.php");
$id=mysqli_real_escape_string($conn,$_POST['id']);
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['content']);
$assigners=mysqli_real_escape_string($conn,$_POST['importance']);
if ($title) { //if title is not empty
	$sql = "UPDATE todo SET title='$title' ,content='$msg',importance='$assigners' where id = $id";
	mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
	$msg = "Message Updated";
} else {
	$msg = "Message title cannot be empty";
}
header("location:todoList.php?m=$msg")//回去本來的頁面 不需要用到BACK(<a href="todoList.php"> Back</a>)
?>

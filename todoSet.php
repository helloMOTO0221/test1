<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update todo set status=1 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
header("location:todoList.php?m=$msg")//回去本來的頁面 不需要用到BACK(<a href="todoList.php"> Back</a>)
?>


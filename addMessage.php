<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$assigners=mysqli_real_escape_string($conn,$_POST['importance']);
if ($title) { //if title is not empty
	$sql = "insert into todo (title, content,importance,status) values ('$title', '$msg','$assigners',0);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "Message added";
} else {
	echo "Message title cannot be empty";
}
header("location:todoList.php?s=$start_time")//回去本來的頁面 不需要用到BACK(<a href="todoList.php"> Back</a>)
?>

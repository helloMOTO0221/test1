<?php
session_start();
require("userModel.php");

$userName = $_POST['id'];
$passWord = $_POST['pwd'];

if (checkUserIDPwd($userName, $passWord)) {
	//provide a link to the message list UI
	echo "<a href='listMessage.php'>go</a>";
} else {
	//print error message
	echo "Invalid Username or Password - Please try again <br />";
}
?>

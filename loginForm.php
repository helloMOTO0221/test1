<?php
session_start();
require("dbconnect.php");
//起床啦 歐哲
//set the login mark to empty
//edited by helloMOTO
$_SESSION['uID'] = "";
?>
<h1>Login Form</h1><hr />
<form method="post" action="loginCheck.php">
User Name: <input type="text" name="id"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit">
</form>

<a href='getUserPassword.php'>Tell me passwords</A>
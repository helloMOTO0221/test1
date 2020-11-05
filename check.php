<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 1 order by applicant desc;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$cal = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Completed List !! </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>applicant</td>
    <td>name</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
  echo "<td>" , $rs['content'], "</td>";
  echo "<td>" , $rs['applicant'], "</td>";
  echo "<td>" . $rs['status']  ;
  echo "<a href='nofinish.php?id={$rs['id']}'>Undone</a>". "</td>" ; 
  $cal += 1;
}
?>
</table>
<?php
echo '總共筆數：',$cal ,'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
// $sql = "select count(*) as C from todo where status = 1;";
// $result = mysqli_query($conn, $sql);
// $rs=mysqli_fetch_assoc($result)
// echo {$rs['c']}  另一種計算方法(用sql語法
?>
<a href="todoList.php"> Back</a>
</body>
</html>
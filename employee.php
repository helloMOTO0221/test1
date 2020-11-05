<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status=0 ORDER BY case when importance like '緊急' then 0 else 1 end,importance desc";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo List !! </p>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>importance</td>
    <td>name</td>
  </tr>
<hr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
  if($rs['importance']=='緊急'){
    $rs['importance'] = '<font color ="red">'. $rs['importance'] . "</font>"; 
  }
  if($rs['importance']=='重要'){
    $rs['importance'] = '<font color ="yellow">'. $rs['importance'] . "</font>"; 
  }
  if($rs['importance']=='一般'){
    $rs['importance'] = '<font color ="green">'. $rs['importance'] . "</font>"; 
  }
  echo "<tr><td>" . $rs['id'] . "</td>";
  echo "<td>{$rs['title']}</td>";
  echo "<td>" , $rs['content'], "</td>";
  echo "<td>" , $rs['importance'], "</td>";
  echo "<td>" . $rs['status'] ;
  echo "<a href='todoSet.php?id={$rs['id']}'>ok&nbsp</a><br>" . "</td>";
}
?>
</table>
<br><a href="Test.html"> Back</a>
</body>
</html>

<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status=0 ORDER BY case when importance like '緊急' then 0 else 1 end,importance desc";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$sql = "select * from todo where status=1 ORDER BY case when importance like '緊急' then 0 else 1 end,importance desc";
$result2=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
if(isset($_GET['m'])){
  $msg = '<font color ="red">' . $_GET['m'] ."</font>"; // .為字串連接功能 ' '是為了和包在裡面的" "做區別
}
  else{
    $msg = 'Good morning Boss ! Have a nice day!';
}
$cal = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>Todo List !! </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>importance</td>
    <td>name</td>
  </tr>
<?php echo $msg ; 
?>
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
  echo "<a href='todoSet.php?id={$rs['id']}'>ok&nbsp</a><br>" ;
  echo "<a href='deleteMessage.php?id={$rs['id']}'>cancel&nbsp</a><br>" ;
  echo "<a href='UpdateMSG.php?id={$rs['id']}'> Update</a>"  . "</td>";
}
while (	$rs=mysqli_fetch_assoc($result2)) {
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
  echo "<a href='nofinish.php?id={$rs['id']}'>NotOK</a><br>" ;
  echo "<a href='deleteMessage.php?id={$rs['id']}'>cancel&nbsp</a><br>" ;
  echo "<a href='UpdateMSG.php?id={$rs['id']}'> Update</a><br>" ;
  echo "<a href='deleteMessage.php?id={$rs['id']}'>end&nbsp</a>" . "</td>" ;
  $cal += 1;
}
?>
</table>
<?php 
echo '總共筆數：',$cal ;
?>
<br>
<a href="addMessageForm.php">Add Task &nbsp</a>
<br><a href="Test.html"> Back</a>
</body>
</html>

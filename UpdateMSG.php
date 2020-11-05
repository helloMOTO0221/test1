<?php
session_start();
require("dbconnect.php");
$msgID=(int)$_GET['id'];
$sql =  "select * from todo where id = $msgID";
$result = mysqli_query($conn, $sql);
while (	$rs=mysqli_fetch_assoc($result)) {
    $id = $rs['id'];
    $title = $rs['title'];
    $msg = $rs['content'];
    $assigners = $rs['importance'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>Update msg</h1>
<form method="post" action="Update.php">

      Task Title: <input name="title" type="text" id="title"value=<?php echo $title ?> > <br>

      Task description: <input name="content" type="text" id="content"value= <?php echo $msg ?>> <br>
      importance: 
      <select name="importance" type="text" id="improtance" onchange="this.submit()"> >
        <option value="緊急" <?php if($assigners=='緊急') echo 'selected'?>>緊急</option>
        <option value="重要"<?php if($assigners=='重要') echo 'selected'?>>重要</option>
        <option value="一般"<?php if($assigners=='一般') echo 'selected'?>>一般</option>
      </select>

	    <input name="id" type="hidden" id="id" value=<?php echo $id ?> /> <br>
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>

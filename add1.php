<?php
header("Content-type:text/html;charset=gb2312");
require 'operate.php';
$sql = new operate();
if(empty($_POST['name'])&&!empty($_POST['add'])){
$a=$_POST['add'];
	$sql->insertdata("class",$a);
	$sql->inserttable($a);
	$sql->close();
		echo"添加类别成功";
		
		
}
?>
<?php
header("Content-type:text/html;charset=gb2312");
require 'operate.php';
$sql = new operate();
if(empty($_POST['delitem'])){
$a=$_POST['delclass'];
	$sql->deletedata("class",$a);
	$sql->deletetable($a);
	$sql->close();
		echo"删除类别成功";		
}else{
$a=$_POST['deltable'];
$b=$_POST['delitem'];
$sql->deletedata($a,$b);
$sql->close();
echo"删除条目成功";	
}
?>

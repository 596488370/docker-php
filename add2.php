<?php
header("Content-type:text/html;charset=gb2312");
require 'operate.php';
$sql = new operate();
if(!empty($_POST['name'])){
$a=$_POST['name'];
$b=$_POST['data1'];
$c=$_POST['data2'];
	//$sql->insertdata($a,$b);
	$sql->insertdata1($a,$b,$c);
	$sql->close();
		echo"添加条目成功";
		
	
}
?>

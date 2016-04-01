<?php
header("Content-type:text/html;charset=gb2312");
require 'operate.php';
$sql = new operate();
if(!empty($_POST['selname'])){
	 //echo $sql->selectname("class");
		//echo"查询class�?;
		//echo $sql.$data;
	 echo json_encode($sql->selectname("class"));	
		$sql->close();
}else{
	$a=$_POST['table'];
	//$a=$_POST['node'];
	echo json_encode($sql->selectname($a));	
	$sql->close();
	//echo $a;
	
}



?>
<?php
header("Content-type:text/html;charset=gb2312");
require 'operate.php';
$sql = new operate();
if($_POST['tra']==1){
$a=$_POST['data'];
$b=$_POST['traname'];
	$sql->update("class",$a,$b);
	$sql->alter($b,$a);
	$sql->close();
		echo"�޸������ɹ�";	
		
}else{
$a=$_POST['tra'];
$b=$_POST['traname'];
$c=$_POST['dataone'];
$d=$_POST['datatwo'];
$sql->update1($a,$d,$b);
$sql->update($a,$c,$b);
$sql->close();
echo"�޸����ɹ�";


}
?>

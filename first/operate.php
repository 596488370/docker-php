<?php
header("Content-type:text/html;charset=gb2312");
require('./Helper.php');
class operate
{

    	private $res; //���ݿ�����
    	private $table; //����
    	private $newtable; //�±�
	private $data; //�ֶβ�ѯ
    /*�������ݿ�
     */
    function __construct()
    {
    	$serverName = env("MYSQL_PORT_3306_TCP_ADDR", "localhost");
        $databaseName = env("MYSQL_INSTANCE_NAME", "web");
        $username = env("MYSQL_USERNAME", "web");
        $password = env("MYSQL_PASSWORD", "secret");
    /*�滻Ϊ���Լ������ݿ���*/
	//$con = mysql_connect(,"root","root");
	//$res = mysql_select_db("test",$con);
	$this->res = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
	//mysql_query("set names gb2312");
	/*if(mysqli_connect_errno()){
	die("���Ӵ���:".mysqli_error($con));
	
	}
	else
	echo"�ɹ�����secret���ݿ�secret��";
	echo "<br/>";	
	*/
	//$dbname = 'rKcpsFLnlIGuZxMaxvBK';
	/*�������ݿ�������Ϣ*/
	//$host = 'sqld.duapp.com';
	//$port = 4050;
	//$user = 'ufhK0xK44TTLUynxnD7fPEhj';//�û���(api key)
	//$pwd = 'A0EvdqlqbL0O6gC5gWgqVseRAcELYNbK';//����(secret key)
 	/*������Ϣ�����������ݿ�����ҳ���ҵ�*/
 
	/*���ŵ���mysql_connect()���ӷ�����*/
	//$con = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
	//$res=mysql_select_db($dbname,$con);
	//mysql_query("set names gb2312",$con);
	//mysql_query("set names utf8",$con);
//if(!$con) {
 //   die("Connect Server Failed: " . mysql_error());
//	}
	/*���ӳɹ�����������mysql_select_db()ѡ����Ҫ���ӵ����ݿ�*/
if(!$res) {
 //   die("Select Database Failed: " . mysql_error($res));
	}
  }
	 

    /**
     * ���ݲ�ѯ,��ѯclassname�ֶ�
     * ����ֵ:����� �� ���(�����ؿ��ַ���)
     */
    public function selectname($table)
    {
		$data = array();  
        $query="select classname from $table";
		$result=$this->res->query($query);
		while($row = mysql_fetch_array($result)){
		//echo "classname��".$row[0]."<br />";
		array_push($data,$row[0]);  
		//$fruits = array("apple","banana","orange","pear")  
  
}
		//var_dump($data);
        return $data;
		//$length=.count($data);
		//$data[0]
		//$data[$length-1]
    }
	/**
     * ���ݲ�ѯ,��ѯippath�ֶ�
     * ����ֵ:����� �� ���(�����ؿ��ַ���)
     */
	
	 public function selectpath($table)
    {
		$data = array();  
        $query="select ippath from $table";
		$result=$this->res->query($query);
		while($row = mysql_fetch_array($result)){
		//echo "classname��".$row[0]."<br />";
		array_push($data,$row[0]);  
		//$fruits = array("apple","banana","orange","pear")  
  
}
		//var_dump($data);
        return $data;
		//$length=.count($data);
		//$data[0]
		//$data[$length-1]
    }
	/**
     * ��������
	 */
	
	 public function alter($table,$table1)
    {
	//alter table ���� rename to �±���
        $sqlStr = "alter table $table rename to $table1";
        return $this->res->query($sqlStr);
    }

    /**
     * ���ݸ���
     * ����ֵ:���ִ�гɹ���ʧ��,ִ�гɹ�������ζ�Ŷ����ݿ�������Ӱ��
     */
    public function update($table,$data,$where)
    {
	
        $sqlStr = "update $table set classname='$data' where classname='$where'";
        return $this->res->query($sqlStr);
    }
	public function update1($table,$data,$where)
    {
	
        $sqlStr = "update $table set ippath='$data' where classname='$where'";
        return $this->res->query($sqlStr);
    }

    /**
     * �������
     */
    public function insertdata($table,$add)
    {
	   $newtable="create table if not exists $table(classname varchar(50) not null)";
	   if(!$this->res->query($newtable))
{
		//echo "�������ݱ��������ţ�".mysql_errno()." ����ԭ��".mysql_error();
} 
       //$b="insert into $table(classname)value('$add')";
	    $b="insert into $table(classname)value('$add')";
		$c=$this->res->query($b);
	if(!$c)
		//echo"����:".mysql_errno()." ����ԭ��".mysql_error();
        return 0;
    }
	public function insertdata1($table,$add,$add1)
    {
		
       $b="insert into $table(classname,ippath)value('$add','$add1')";
	    //$b="insert into $table(ippath)value('$add')";
		$c=$this->res->query($b);
	if(!$c)
		//echo"����:".mysql_errno()." ����ԭ��".mysql_error();
        return 0;
    }
	 public function inserttable($table)
    {
		$newtable="create table if not exists $table(classname varchar(50) not null,ippath varchar(300) not null)";   
	if(!$this->res->query($newtable))
{
		//echo "�������ݱ��������ţ�".mysql_errno()." ����ԭ��".mysql_error();
} 
    }

    /**
     * ����ɾ��
     */
    public function deletedata($table,$where)
    {
        $sqlStr = "delete from $table where classname='$where'";
        return $this->res->query($sqlStr);
    }
	 public function deletetable($table)
    {
		$drop=$this->res->query("drop table $table"); 
    if(!$this->res->query($drop))
{
		//echo "ɾ�����ݱ��������ţ�".mysql_errno()." ����ԭ��".mysql_error();
} 
    }

    /**
     * �ر�MySQL����
     */
    public function close()
    {
       //return mysql_close($con);
    }

}

?>

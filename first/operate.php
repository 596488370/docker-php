<?php
header("Content-type:text/html;charset=gb2312");
require('./Helper.php');
class operate
{

    	private $res; //数据库连接
    	private $table; //表名
    	private $newtable; //新表
	private $data; //字段查询
    /*连接数据库
     */
    function __construct()
    {
    	$serverName = env("MYSQL_PORT_3306_TCP_ADDR", "localhost");
        $databaseName = env("MYSQL_INSTANCE_NAME", "web");
        $username = env("MYSQL_USERNAME", "web");
        $password = env("MYSQL_PASSWORD", "secret");
    /*替换为你自己的数据库名*/
	//$con = mysql_connect(,"root","root");
	//$res = mysql_select_db("test",$con);
	$this->res = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
	//mysql_query("set names gb2312");
	/*if(mysqli_connect_errno()){
	die("连接错误:".mysqli_error($con));
	
	}
	else
	echo"成功连接secret数据库secret表";
	echo "<br/>";	
	*/
	//$dbname = 'rKcpsFLnlIGuZxMaxvBK';
	/*填入数据库连接信息*/
	//$host = 'sqld.duapp.com';
	//$port = 4050;
	//$user = 'ufhK0xK44TTLUynxnD7fPEhj';//用户名(api key)
	//$pwd = 'A0EvdqlqbL0O6gC5gWgqVseRAcELYNbK';//密码(secret key)
 	/*以上信息都可以在数据库详情页查找到*/
 
	/*接着调用mysql_connect()连接服务器*/
	//$con = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
	//$res=mysql_select_db($dbname,$con);
	//mysql_query("set names gb2312",$con);
	//mysql_query("set names utf8",$con);
//if(!$con) {
 //   die("Connect Server Failed: " . mysql_error());
//	}
	/*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
if(!$res) {
 //   die("Select Database Failed: " . mysql_error($res));
	}
  }
	 

    /**
     * 数据查询,查询classname字段
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
    public function selectname($table)
    {
		$data = array();  
        $query="select classname from $table";
		$result=$this->res->query($query);
		while($row = mysql_fetch_array($result)){
		//echo "classname：".$row[0]."<br />";
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
     * 数据查询,查询ippath字段
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
	
	 public function selectpath($table)
    {
		$data = array();  
        $query="select ippath from $table";
		$result=$this->res->query($query);
		while($row = mysql_fetch_array($result)){
		//echo "classname：".$row[0]."<br />";
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
     * 表名更新
	 */
	
	 public function alter($table,$table1)
    {
	//alter table 表名 rename to 新表名
        $sqlStr = "alter table $table rename to $table1";
        return $this->res->query($sqlStr);
    }

    /**
     * 数据更新
     * 返回值:语句执行成功或失败,执行成功并不意味着对数据库做出了影响
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
     * 数据添加
     */
    public function insertdata($table,$add)
    {
	   $newtable="create table if not exists $table(classname varchar(50) not null)";
	   if(!$this->res->query($newtable))
{
		//echo "创建数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
} 
       //$b="insert into $table(classname)value('$add')";
	    $b="insert into $table(classname)value('$add')";
		$c=$this->res->query($b);
	if(!$c)
		//echo"错误:".mysql_errno()." 错误原因：".mysql_error();
        return 0;
    }
	public function insertdata1($table,$add,$add1)
    {
		
       $b="insert into $table(classname,ippath)value('$add','$add1')";
	    //$b="insert into $table(ippath)value('$add')";
		$c=$this->res->query($b);
	if(!$c)
		//echo"错误:".mysql_errno()." 错误原因：".mysql_error();
        return 0;
    }
	 public function inserttable($table)
    {
		$newtable="create table if not exists $table(classname varchar(50) not null,ippath varchar(300) not null)";   
	if(!$this->res->query($newtable))
{
		//echo "创建数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
} 
    }

    /**
     * 数据删除
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
		//echo "删除数据表出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
} 
    }

    /**
     * 关闭MySQL连接
     */
    public function close()
    {
       //return mysql_close($con);
    }

}

?>

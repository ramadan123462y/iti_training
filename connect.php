<?PHP
$hostname="mysql:host=localhost;dbname=college";
$user='root';
$pass="";
$option=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8",PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
try{
  $connection=new PDO($hostname,$user,$pass,$option);
}catch(PDOException $e){
echo("error to connection to data base ".$e->getMessage());
}
?>
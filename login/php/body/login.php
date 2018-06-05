<?php
$db=new PDO("mysql:host=localhost;
                dbname=".$dsn, $user, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sth = $db->prepare("SELECT * FROM menber WHERE id=:id AND password=:pass");
$sth->bindParam(':id', $_POST['id']);
$sth->bindParam(':pass', $_POST['pass']);
$sth->execute();

$row = $sth->fetch(PDO::FETCH_ASSOC);

if(!($row)) //判断
{
echo "登入失敗";
header("refresh:3,url=/login");

}
else
{
echo "登入成功";
$_SESSION['username'] = $_POST['id'];
$_SESSION['pv'] = 0;
header("refresh:3,url=/login/menu");

}

$db = null;
?>
                

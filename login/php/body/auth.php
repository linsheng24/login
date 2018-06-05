<?php

require_once("./lib/dbconfig.php");

$db = new PDO("mysql:host=localhost;dbname=".$dsn,$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$stmt = $db->prepare(" SELECT * FROM menber WHERE mail=:mail ");
$stmt->bindParam(':mail',$_GET['mail']);

$row = $stmt->execute();

if(!$row){
    echo '信箱驗證錯誤';
}
else{
    header('Location: ./change.php?mail='.hash('sha256', $_GET['mail']));
}






?>
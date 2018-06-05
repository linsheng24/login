<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form method="post">

帳號: <input type="text" name="id"><br>
密碼: <input type="password" name="pass">

<button type="button" value="login" onClick="this.form.action='mlogin';this.form.submit();">登入</button>
<button type="button" value="regist" onClick="this.form.action='regist';this.form.submit();">申請</button>
<button type="button" value="regist" onClick="this.form.action='forget';this.form.submit();">忘記密碼</button>

</form>
</body>
</html>

<?php
if($_SESSION['username'] != null){
    header("Location:./menu");
}


$suc = "";

$db=new PDO("mysql:host=localhost;
                dbname=".$dsn, $user, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$insert = $db->prepare("INSERT INTO menber ( id, password ) VALUES (:id,:pass)");
$insert->bindParam(":id",$_POST['id']);
$insert->bindParam(":pass",$_POST['pass']);


$result = $insert->execute();
$errorcode = $insert->errorCode();

if($result){
    $suc = "申請成功";
}
echo "<p>".$suc."</p>"

?>

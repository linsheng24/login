<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="regist" method="post">
        姓名 <input type="text" name="name" id="name" ><br>
        性別 <input type=radio name=sex value=1>男
             <input type=radio name=sex value=0 checked>女<br>
        生日 <input type="text" name="birth" id="birth"><br>
        聯絡電話 <input type="text" name="phone1" id="phone1"><br> 
        市話 <input type="text" name="phone2" id="phone2"><br>
        通訊地址 <input type="text" name="adress" id="adress"><br>
        電子信箱 <input type="text" name="mail" id="mail"><br>
        LINE ID <input type="text" name="line" id="line"><br>
        密碼 <input type="password" name="pass" id="pass"><br>
        確認密碼 <input type="password" name="rpass" id="rpass"><br>

        <input type="submit" value="註冊">

    </form>


</body>
</html>



<?php


$db=new PDO("mysql:host=localhost;
                dbname=".$dsn, $user, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$insert = $db->prepare("INSERT INTO menber ( name, password, mail, birth, phone1, phone2, line, sex, address) VALUES (:name,:pass,:mail,:birth,:phone1,:phone2,:line,:sex,:address)");
$insert->bindParam(":name",$_POST['name']);
$insert->bindParam(":pass",$_POST['pass']);
$insert->bindParam(":mail",$_POST['mail']);
$insert->bindParam(":birth",$_POST['birth']);
$insert->bindParam(":phone1",$_POST['phone1']);
$insert->bindParam(":phone2",$_POST['phone2']);
$insert->bindParam(":line",$_POST['line']);
$insert->bindParam(":sex",$_POST['sex']);
$insert->bindParam(":address",$_POST['address']);


$result = $insert->execute();
$errorcode = $insert->errorCode();

if($result){
$suc = "申請成功";

header("Location:./index.php");

}
else{
    
    echo $_POST['name'];
    echo $_POST['pass'];
    echo $_POST['mail'];
    echo $_POST['birth'];
    echo $_POST['phone1'];
    echo $_POST['phone2'];
    echo $_POST['line'];
    echo $_POST['sex'];
    echo $_POST['address'];
}

?>
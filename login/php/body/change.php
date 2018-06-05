<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action='change' method='post'>
    

    輸入更改的密碼:<input type="password" name="change" id="change">

    <input type='hidden' name='mail' value='<?php echo $_POST['mail']?>'/>

<input type="submit" value="提交">

    </form>
</body>
</html>

<?php
    
    if(isset($_POST['change']) && !(empty($_POST['change']))){
    $db = new PDO("mysql:host=localhost;dbname=".$dsn,$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // $stmt = $db->prepare(" 
    // UPDATE menber
    // SET password = :password
    // WHERE SHA2(mail,256) = :mail 
    // ");
    $stmt = $db->prepare(" 
    UPDATE menber
    SET password = :password
    WHERE mail = :mail 
    ");
    $stmt->bindParam(':password',hash('sha256', $_POST['change']));
    $stmt->bindParam(':mail',$_POST['mail']);
    $row = $stmt->execute();
    echo $_POST['change'].'<br>';
    echo $_POST['mail'];

    header('Location: /login/index.php');

    }

?>
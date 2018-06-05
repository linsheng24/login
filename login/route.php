<?php
require('vendor/autoload.php'); 

$route = new Router(Request::uri()); //搭配 .htaccess 排除資料夾名稱後解析 URL
//echo $route->getParameter(1); // 從 http://127.0.0.1/game/aaa/bbb 取得 aaa 字串之意

// 用參數決定載入某頁並讀取需要的資料
switch($route->getParameter(1)){
    case "regist":
      include('view/body/regist.php');
    break;

    case "mlogin":
      include('php/body/login.php');
    break;

    case "logout":
      include('php/body/logout.php');
    break;

    case "menu":
      include('php/body/menu.php');
    break;

    case "forget":
      include('php/body/forget.html');
    break;

    case "mail":
      include('php/body/mail.php');
    break;

    case "change":
      include('php/body/change.php');
    break;

    default:
      include('php/body/loginPage.php');
    break;
    
}

?>
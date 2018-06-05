<?php

$route = new Router(Request::uri()); 
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
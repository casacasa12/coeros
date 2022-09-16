<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
$country=$details->geoplugin_countryCode;
if ( $country != 'ES') {
    header('Location: http://www.' . $country . '.com');
    exit();
}
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

if($isMob!="Not a mobile device"){
  header('Location: https://google.com');
exit();
}

?>

<!DOCTYPE html>

<html>
<script>
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
if (isMobile) {
	console.log(isMobile);
}else{
	location.href="https://www."<?php echo $country ?>".com";
}
</script>
<body>
<META HTTP-EQUIV='Refresh' Content=0;URL='./es/index.php'>
 
</body>

</html>
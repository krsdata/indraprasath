<?php
/**
* ShCurrencyConverter module
* Autor: http://www.efxto.com
* Version: 1.0
* @license GNU/GPLv3,
*/
if(!class_exists('JFactory')) {
  define( 'DS', DIRECTORY_SEPARATOR );
  $rootFolder = explode(DS,dirname(__FILE__));
	
   //current level in diretoty structure
   (int)$currentfolderlevel = 3;

   array_splice($rootFolder,-$currentfolderlevel);

   $base_folder = implode(DS,$rootFolder);


   if(is_dir($base_folder.DS.'libraries'.DS.'joomla'))   
    {
	define( '_JEXEC', 1 );
	
	define('JPATH_BASE',implode(DS,$rootFolder));
	
	require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
        require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
   }
   $mainframe = JFactory::getApplication('site');
   $mainframe->initialise();
}
$language= JFactory::getLanguage(); //get the current language
$language->load( 'mod_shcurrencyconverter', JPATH_SITE.DS.'modules'.DS.'mod_shcurrencyconverter' );
$data = '';
$str_from = '';
if (isset($currency_from)) $str_from = $currency_from;
$postcurrency_from = JRequest::getVar('from','','post','string');
if (isset($postcurrency_from) && $postcurrency_from!='') $str_from = $postcurrency_from;
if ($str_from=='') $str_from = 'USD';

$str_to = '';
if (isset($currency_to)) $str_to = $currency_to;
$postcurrency_to = JRequest::getVar('to','','post','string');
if (isset($postcurrency_to) && $postcurrency_to!='') $str_to = $postcurrency_to;
if ($str_to=='') $str_to = 'EUR';

$process = JRequest::getInt('process',0,'post');
if ((int) $process==1) {
	$data = getquote($str_from,$str_to);
}

(int) $str_a = 0;
$post_a = JRequest::getInt('a',1);
if (isset($post_a)) (int) $str_a = $post_a;
if ($str_a < 1) (int) $str_a = 1;

$label_convert = JText::_('MOD_SHCURRENCYCONVERTER_CONVERT','Convert');
$label_into = JText::_('MOD_SHCURRENCYCONVERTER_INTO','Into');
$submit_button_label = JText::_('MOD_SHCURRENCYCONVERTER_SUBMIT','Submit');

$postsstyle = JRequest::getInt('style',0);
if (isset($postsstyle) && (int)$postsstyle>0) (int)$style = $postsstyle;
if ($style<1 || $style>3) (int)$style = 1;


if ($data!='') {
	$shquotes_v = $str_a;
	$data = floatval($str_a) * floatval($data);
}

$uri = JFactory::getUri();
$uri->setQuery($uri->getQuery()."&hitcount=0");
$uri = JRoute::_($uri->toString()."#shcurrency_container");
$currencies = setup_currencies();
$converterform = "<form action=\"".$uri."\" method=\"post\" id=\"shcurrency_form\">";
$converterform .= "<div class=\"shcurrency\">";
if ($style==2) {
	$converterform .= "<table class=\"table1\" border=\"0\">";
	$converterform .= "<tr><td class=\"td00\">";
	if ($label_convert!='') $converterform .= "<span class=\"input_label\">".$label_convert."&nbsp;</span>";
	$converterform .= "</td>";
	$converterform .= "<td class=\"td01\"><input name=\"a\" class=\"inputbox\" maxlength=\"12\" size=\"5\" autocomplete=\"off\" value=\"".$str_a."\">&nbsp;</td><td class=\"td02\">";
	$converterform .= select_currency_pulldownmenu($currencies, 'from', $str_from);
	$converterform .= "</td><td class=\"td03\"></td></tr><tr><td class=\"td10\"></td><td class=\"td11\">";
	if ($label_into!='') $converterform .= "<span class=\"input_label\">".$label_into."&nbsp;</span>";
	$converterform .= "</td><td class=\"td12\">";
	$converterform .= select_currency_pulldownmenu($currencies, 'to', $str_to);
	$converterform .= "</td><td class=\"td13\"></td></tr><tr><td colspan=\"3\" class=\"td2\"><table class=\"table2\" cellpadding=\"2\" border=\"0\"><tr><td class=\"td20\">";
	if ($data!='') {
		$converterform .= "<div id=\"shcurrency_result\" class=\"result\">".$shquotes_v." ".$str_from." = <strong><span class=\"highlight\">".$data."</span> ".$str_to."</strong></div>";
	} else {
		$converterform .= "&nbsp;";
	}
	$converterform .= "</td><td class=\"td21\">";
	$converterform .= "<span id=\"shcurrency_loading\"></span>&nbsp;&nbsp;<input type=\"submit\" value=\"".$submit_button_label."\" class=\"button\">";
	$converterform .= "</td></tr></table></td>";
	$converterform .= "<td class=\"td23\"></td>";
	$converterform .= "</td></tr>";
	$converterform .= "</table>";

} elseif ($style==3) {
	if ($label_convert!='') $converterform .= "<span class=\"input_label\">".$label_convert."&nbsp;</span>";
	$converterform .= "<input name=\"a\" class=\"inputbox\" maxlength=\"12\" size=\"5\" autocomplete=\"off\" value=\"".$str_a."\">&nbsp;";
	$converterform .= select_currency_pulldownmenu($currencies, 'from', $str_from);
	if ($label_into!='') $converterform .= "<span class=\"input_label\">&nbsp;".$label_into."&nbsp;</span>";
	$converterform .= select_currency_pulldownmenu($currencies, 'to', $str_to);
	$converterform .= "&nbsp;";
	$converterform .= "<input type=\"submit\" value=\"".$submit_button_label."\" class=\"button\">&nbsp;&nbsp;";
	$converterform .= "<span id=\"shcurrency_loading\"></span><br />";
	if ($data!='') {
		$converterform .= "<div id=\"shcurrency_result\" class=\"result\">".$shquotes_v." ".$str_from." = <strong><span class=\"highlight\">".$data."</span> ".$str_to."</strong></div>";
	}

} else {
	$converterform .= "<span class=\"input_label\">".$label_convert."&nbsp;</span>";
	$converterform .= "<input name=\"a\" class=\"inputbox\" maxlength=\"12\" size=\"5\" autocomplete=\"off\" value=\"".$str_a."\"><br />";
	$converterform .= select_currency_pulldownmenu($currencies, 'from', $str_from);
	$converterform .= '<br />';
	$converterform .= "<span class=\"input_label\">".$label_into."</span><br />";

	$converterform .= select_currency_pulldownmenu($currencies, 'to', $str_to);
	$converterform .= "<br />";
	$converterform .= "<input type=\"submit\" value=\"".$submit_button_label."\" class=\"button\"><br />";
	$converterform .= "<span id=\"shcurrency_loading\"></span><br />";
	if ($data!='') {
		$converterform .= "<div id=\"shcurrency_result\" class=\"result\">".$shquotes_v." ".$str_from." = <strong><span class=\"highlight\">".$data."</span> ".$str_to."</strong></div>";
	}
}
$converterform .= "<input type=\"hidden\" name=\"style\" value=\"".$style."\">\n";
$converterform .= "<input type=\"hidden\" name=\"process\" value=\"1\">\n";
$converterform .= '</div>';
$converterform .= '</form>';
echo $converterform;

function select_currency_pulldownmenu($options, $var, $value, $postfix='', $prefix='') {
	$str = "<select name=\"$var\" id=\"$var\" class=\"$var\">";
	foreach($options as $k=>$v) {
		$selected = '';
		if ($k==$value) $selected = ' selected';
		$str .= "<option value=\"$k\"$selected>$v</option>";
	}
	$str .= "</select>";
	return $prefix.$str.$postfix;
}

function getquote($str_from,$str_to) {
		$data = file_get_contents('http://download.finance.yahoo.com/d/quotes.csv?s='.$str_from.$str_to.'=X&f=n0s0x0l1g0h0j0k0c1p2v0a2p0o0&e=.csv');
		$val = '';
                if ($data !== false) {
                   $data = str_replace('"', '', $data);
                   $data = explode(',', $data);
                   $val = $data[3];
                }
		return $val;
}

function setup_currencies() {
	$currencies = array(
"ALL" => JText::_('MOD_SHCURRENCYCONVERTER_ALBANIA_LEK')." (ALL)",
"DZD" => JText::_('MOD_SHCURRENCYCONVERTER_ALGERIA_DINAR')." (DZD)",
"XAL" => JText::_('MOD_SHCURRENCYCONVERTER_ALUMINIUM_OUNCES')." (XAL)",
"ARS" => JText::_('MOD_SHCURRENCYCONVERTER_ARGENTINA_PESO')." (ARS)",
"AWG" => JText::_('MOD_SHCURRENCYCONVERTER_ARUBA_FLORIN')." (AWG)",
"AUD" => JText::_('MOD_SHCURRENCYCONVERTER_AUSTRALIA_DOLLAR')." (AUD)",
"BSD" => JText::_('MOD_SHCURRENCYCONVERTER_BAHAMAS_DOLLAR')." (BSD)",
"BHD" => JText::_('MOD_SHCURRENCYCONVERTER_BAHRAINI_DINAR')." (BHD)",
"BDT" => JText::_('MOD_SHCURRENCYCONVERTER_BANGLADESH_TAKA')." (BDT)",
"BBD" => JText::_('MOD_SHCURRENCYCONVERTER_BARBADOS_DOLLAR')." (BBD)",
"BYR" => JText::_('MOD_SHCURRENCYCONVERTER_BELARUS_RUBLE')." (BYR)",
"BZD" => JText::_('MOD_SHCURRENCYCONVERTER_BELIZE_DOLLAR')." (BZD)",
"BMD" => JText::_('MOD_SHCURRENCYCONVERTER_BERMUDA_DOLLAR')." (BMD)",
"BTN" => JText::_('MOD_SHCURRENCYCONVERTER_BHUTAN_NGULTRUM')." (BTN)",
"BOB" => JText::_('MOD_SHCURRENCYCONVERTER_BOLIVIAN_BOLIVIANO')." (BOB)",
"BWP" => JText::_('MOD_SHCURRENCYCONVERTER_BOTSWANA_PULA')." (BWP)",
"BRL" => JText::_('MOD_SHCURRENCYCONVERTER_BRAZILIAN_REAL')." (BRL)",
"GBP" => JText::_('MOD_SHCURRENCYCONVERTER_BRITISH_POUND')." (GBP)",
"BND" => JText::_('MOD_SHCURRENCYCONVERTER_BRUNEI_DOLLAR')." (BND)",
"BGN" => JText::_('MOD_SHCURRENCYCONVERTER_BULGARIAN_LEV')." (BGN)",
"MMK" => JText::_('MOD_SHCURRENCYCONVERTER_BURMA_KYAT')." (MMK)",
"BIF" => JText::_('MOD_SHCURRENCYCONVERTER_BURUNDI_FRANC')." (BIF)",
"KHR" => JText::_('MOD_SHCURRENCYCONVERTER_CAMBODIA_RIEL')." (KHR)",
"CAD" => JText::_('MOD_SHCURRENCYCONVERTER_CANADIAN_DOLLAR')." (CAD)",
"CVE" => JText::_('MOD_SHCURRENCYCONVERTER_CAPE_VERDE_ESCUDO')." (CVE)",
"KYD" => JText::_('MOD_SHCURRENCYCONVERTER_CAYMAN_ISLANDS_DOLLAR')." (KYD)",
"XOF" => JText::_('MOD_SHCURRENCYCONVERTER_CFA_FRANC')." (BCEAO) (XOF)",
"XAF" => JText::_('MOD_SHCURRENCYCONVERTER_CFA_FRANC')." (BEAC) (XAF)",
"CLP" => JText::_('MOD_SHCURRENCYCONVERTER_CHILEAN_PESO')." (CLP)",
"CNY" => JText::_('MOD_SHCURRENCYCONVERTER_CHINESE_YUAN')." (CNY)",
"COP" => JText::_('MOD_SHCURRENCYCONVERTER_COLOMBIAN_PESO')." (COP)",
"KMF" => JText::_('MOD_SHCURRENCYCONVERTER_COMOROS_FRANC')." (KMF)",
"XCP" => JText::_('MOD_SHCURRENCYCONVERTER_COPPER_POUNDS')." (XCP)",
"CRC" => JText::_('MOD_SHCURRENCYCONVERTER_COSTA_RICA_COLON')." (CRC)",
"HRK" => JText::_('MOD_SHCURRENCYCONVERTER_CROATIAN_KUNA')." (HRK)",
"CUP" => JText::_('MOD_SHCURRENCYCONVERTER_CUBAN_PESO')." (CUP)",
"CYP" => JText::_('MOD_SHCURRENCYCONVERTER_CYPRUS_POUND')." (CYP)",
"CZK" => JText::_('MOD_SHCURRENCYCONVERTER_CZECH_KORUNA')." (CZK)",
"DKK" => JText::_('MOD_SHCURRENCYCONVERTER_DANISH_KRONE')." (DKK)",
"DJF" => JText::_('MOD_SHCURRENCYCONVERTER_DIJBOUTI_FRANC')." (DJF)",
"DOP" => JText::_('MOD_SHCURRENCYCONVERTER_DOMINICAN_PESO')." (DOP)",
"XCD" => JText::_('MOD_SHCURRENCYCONVERTER_EAST_CARIBBEAN_DOLLAR')." (XCD)",
"ECS" => JText::_('MOD_SHCURRENCYCONVERTER_ECUADOR_SUCRE')." (ECS)",
"EGP" => JText::_('MOD_SHCURRENCYCONVERTER_EGYPTIAN_POUND')." (EGP)",
"SVC" => JText::_('MOD_SHCURRENCYCONVERTER_EL_SALVADOR_COLON')." (SVC)",
"ERN" => JText::_('MOD_SHCURRENCYCONVERTER_ERITREA_NAKFA')." (ERN)",
"EEK" => JText::_('MOD_SHCURRENCYCONVERTER_ESTONIAN_KROON')." (EEK)",
"ETB" => JText::_('MOD_SHCURRENCYCONVERTER_ETHIOPIAN_BIRR')." (ETB)",
"EUR" => JText::_('MOD_SHCURRENCYCONVERTER_EURO')." (EUR)",
"FKP" => JText::_('MOD_SHCURRENCYCONVERTER_FALKLAND_ISLANDS_POUND')." (FKP)",
"FJD" => JText::_('MOD_SHCURRENCYCONVERTER_FIJI_DOLLAR')." (FJD)",
"GMD" => JText::_('MOD_SHCURRENCYCONVERTER_GAMBIAN_DALASI')." (GMD)",
"GHC" => JText::_('MOD_SHCURRENCYCONVERTER_GHANIAN_CEDI')." (GHC)",
"GIP" => JText::_('MOD_SHCURRENCYCONVERTER_GIBRALTAR_POUND')." (GIP)",
"XAU" => JText::_('MOD_SHCURRENCYCONVERTER_GOLD_OUNCES')." (XAU)",
"GTQ" => JText::_('MOD_SHCURRENCYCONVERTER_GUATEMALA_QUETZAL')." (GTQ)",
"GNF" => JText::_('MOD_SHCURRENCYCONVERTER_GUINEA_FRANC')." (GNF)",
"GYD" => JText::_('MOD_SHCURRENCYCONVERTER_GUYANA_DOLLAR')." (GYD)",
"HTG" => JText::_('MOD_SHCURRENCYCONVERTER_HAITI_GOURDE')." (HTG)",
"HNL" => JText::_('MOD_SHCURRENCYCONVERTER_HONDURAS_LEMPIRA')." (HNL)",
"HKD" => JText::_('MOD_SHCURRENCYCONVERTER_HONG_KONG_DOLLAR')." (HKD)",
"HUF" => JText::_('MOD_SHCURRENCYCONVERTER_HUNGARIAN_FORINT')." (HUF)",
"ISK" => JText::_('MOD_SHCURRENCYCONVERTER_ICELAND_KRONA')." (ISK)",
"INR" => JText::_('MOD_SHCURRENCYCONVERTER_INDIAN_RUPEE')." (INR)",
"IDR" => JText::_('MOD_SHCURRENCYCONVERTER_INDONESIAN_RUPIAH')." (IDR)",
"IRR" => JText::_('MOD_SHCURRENCYCONVERTER_IRAN_RIAL')." (IRR)",
"IQD" => JText::_('MOD_SHCURRENCYCONVERTER_IRAQI_DINAR')." (IQD)",
"ILS" => JText::_('MOD_SHCURRENCYCONVERTER_ISRAELI_SHEKEL')." (ILS)",
"JMD" => JText::_('MOD_SHCURRENCYCONVERTER_JAMAICAN_DOLLAR')." (JMD)",
"JPY" => JText::_('MOD_SHCURRENCYCONVERTER_JAPANESE_YEN')." (JPY)",
"JOD" => JText::_('MOD_SHCURRENCYCONVERTER_JORDANIAN_DINAR')." (JOD)",
"KZT" => JText::_('MOD_SHCURRENCYCONVERTER_KAZAKHSTAN_TENGE')." (KZT)",
"KES" => JText::_('MOD_SHCURRENCYCONVERTER_KENYAN_SHILLING')." (KES)",
"KRW" => JText::_('MOD_SHCURRENCYCONVERTER_KOREAN_WON')." (KRW)",
"KWD" => JText::_('MOD_SHCURRENCYCONVERTER_KUWAITI_DINAR')." (KWD)",
"LAK" => JText::_('MOD_SHCURRENCYCONVERTER_LAO_KIP')." (LAK)",
"LVL" => JText::_('MOD_SHCURRENCYCONVERTER_LATVIAN_LAT')." (LVL)",
"LBP" => JText::_('MOD_SHCURRENCYCONVERTER_LEBANESE_POUND')." (LBP)",
"LSL" => JText::_('MOD_SHCURRENCYCONVERTER_LESOTHO_LOTI')." (LSL)",
"LRD" => JText::_('MOD_SHCURRENCYCONVERTER_LIBERIAN_DOLLAR')." (LRD)",
"LYD" => JText::_('MOD_SHCURRENCYCONVERTER_LIBYAN_DINAR')." (LYD)",
"LTL" => JText::_('MOD_SHCURRENCYCONVERTER_LITHUANIAN_LITA')." (LTL)",
"MOP" => JText::_('MOD_SHCURRENCYCONVERTER_MACAU_PATACA')." (MOP)",
"MKD" => JText::_('MOD_SHCURRENCYCONVERTER_MACEDONIAN_DENAR')." (MKD)",
"MWK" => JText::_('MOD_SHCURRENCYCONVERTER_MALAWI_KWACHA')." (MWK)",
"MYR" => JText::_('MOD_SHCURRENCYCONVERTER_MALAYSIAN_RINGGIT')." (MYR)",
"MVR" => JText::_('MOD_SHCURRENCYCONVERTER_MALDIVIES_RUFIYAA')." (MVR)",
"MTL" => JText::_('MOD_SHCURRENCYCONVERTER_MALTESE_LIRA')." (MTL)",
"MRO" => JText::_('MOD_SHCURRENCYCONVERTER_MAURITANIA_OUGULYA')." (MRO)",
"MUR" => JText::_('MOD_SHCURRENCYCONVERTER_MAURITIUS_RUPEE')." (MUR)",
"MXN" => JText::_('MOD_SHCURRENCYCONVERTER_MEXICAN_PESO')." (MXN)",
"MDL" => JText::_('MOD_SHCURRENCYCONVERTER_MOLDOVAN_LEU')." (MDL)",
"MNT" => JText::_('MOD_SHCURRENCYCONVERTER_MONGOLIAN_TUGRIK')." (MNT)",
"MAD" => JText::_('MOD_SHCURRENCYCONVERTER_MOROCCAN_DIRHAM')." (MAD)",
"NAD" => JText::_('MOD_SHCURRENCYCONVERTER_NAMIBIAN_DOLLAR')." (NAD)",
"NPR" => JText::_('MOD_SHCURRENCYCONVERTER_NEPALESE_RUPEE')." (NPR)",
"ANG" => JText::_('MOD_SHCURRENCYCONVERTER_NETH_ANTILLES_GUILDER')." (ANG)",
"TRY" => JText::_('MOD_SHCURRENCYCONVERTER_TURKISH_LIRA')." (TRY)",
"NZD" => JText::_('MOD_SHCURRENCYCONVERTER_NEW_ZELAND_DOLLAR')." (NZD)",
"NIO" => JText::_('MOD_SHCURRENCYCONVERTER_NICARAGUA_CORDOBA')." (NIO)",
"NGN" => JText::_('MOD_SHCURRENCYCONVERTER_NIGERIAN_NAIRA')." (NGN)",
"KPW" => JText::_('MOD_SHCURRENCYCONVERTER_NORTH_KOREAN_WON')." (KPW)",
"NOK" => JText::_('MOD_SHCURRENCYCONVERTER_NORWEGIAN_KRONE')." (NOK)",
"OMR" => JText::_('MOD_SHCURRENCYCONVERTER_OMANI_RIAL')." (OMR)",
"XPF" => JText::_('MOD_SHCURRENCYCONVERTER_PACIFIC_FRANC')." (XPF)",
"PKR" => JText::_('MOD_SHCURRENCYCONVERTER_PAKISTANI_RUPEE')." (PKR)",
"XPD" => JText::_('MOD_SHCURRENCYCONVERTER_PALLANDIUM_OUNCES')." (XPD)",
"PAB" => JText::_('MOD_SHCURRENCYCONVERTER_PANAMA_BALBOA')." (PAB)",
"PGK" => JText::_('MOD_SHCURRENCYCONVERTER_PAPUA_NEW_GUINEA_KINA')." (PGK)",
"PYG" => JText::_('MOD_SHCURRENCYCONVERTER_PARAGUAYAN_GUARANI')." (PYG)",
"PEN" => JText::_('MOD_SHCURRENCYCONVERTER_PERUVIAN_SOL')." (PEN)",
"PHP" => JText::_('MOD_SHCURRENCYCONVERTER_PHILIPPINE_PESO')." (PHP)",
"XPT" => JText::_('MOD_SHCURRENCYCONVERTER_PLATINUM_OUNCES')." (XPT)",
"PLN" => JText::_('MOD_SHCURRENCYCONVERTER_POLISH_ZLOTY')." (PLN)",
"QAR" => JText::_('MOD_SHCURRENCYCONVERTER_QATAR_RIAL')." (QAR)",
"RON" => JText::_('MOD_SHCURRENCYCONVERTER_ROMANIAN_LEU')." (RON)",
"RUB" => JText::_('MOD_SHCURRENCYCONVERTER_RUSSIAN_RUBLE')." (RUB)",
"RWF" => JText::_('MOD_SHCURRENCYCONVERTER_RWANDA_FRANC')." (RWF)",
"WST" => JText::_('MOD_SHCURRENCYCONVERTER_SAMOA_TALA')." (WST)",
"STD" => JText::_('MOD_SHCURRENCYCONVERTER_SAO_TOME_DOBRA')." (STD)",
"SAR" => JText::_('MOD_SHCURRENCYCONVERTER_SAUDI_RIYAL')." (SAR)",
"SCR" => JText::_('MOD_SHCURRENCYCONVERTER_SEYCHELLES_RUPPE')." (SCR)",
"SLL" => JText::_('MOD_SHCURRENCYCONVERTER_SIERRA_LEONE_LEONE')." (SLL)",
"XAG" => JText::_('MOD_SHCURRENCYCONVERTER_SILVER_OUNCES')." (XAG)",
"SGD" => JText::_('MOD_SHCURRENCYCONVERTER_SINGAPORE_DOLLAR')." (SGD)",
"SKK" => JText::_('MOD_SHCURRENCYCONVERTER_SLOVAK_KORUNA')." (SKK)",
"SIT" => JText::_('MOD_SHCURRENCYCONVERTER_SLOVENIAN_TOLAR')." (SIT)",
"SBD" => JText::_('MOD_SHCURRENCYCONVERTER_SOLOMON_ISLANDS_DOLLAR')." (SBD)",
"SOS" => JText::_('MOD_SHCURRENCYCONVERTER_SOMALI_SHILLING')." (SOS)",
"ZAR" => JText::_('MOD_SHCURRENCYCONVERTER_SOUTH_AFRICAN_RAND')." (ZAR)",
"LKR" => JText::_('MOD_SHCURRENCYCONVERTER_SRI_LANKA_RUPEE')." (LKR)",
"SHP" => JText::_('MOD_SHCURRENCYCONVERTER_ST_HELENA_POUND')." (SHP)",
"SDD" => JText::_('MOD_SHCURRENCYCONVERTER_SUDANESE_DINAR')." (SDD)",
"SZL" => JText::_('MOD_SHCURRENCYCONVERTER_SWAZILAND_LILANGENI')." (SZL)",
"SEK" => JText::_('MOD_SHCURRENCYCONVERTER_SWEDISH_KRONA')." (SEK)",
"CHF" => JText::_('MOD_SHCURRENCYCONVERTER_SWISS_FRANC')." (CHF)",
"SYP" => JText::_('MOD_SHCURRENCYCONVERTER_SYRIAN_POUND')." (SYP)",
"TWD" => JText::_('MOD_SHCURRENCYCONVERTER_TAIWAN_DOLLAR')." (TWD)",
"TZS" => JText::_('MOD_SHCURRENCYCONVERTER_TANZANIAN_SHILLING')." (TZS)",
"THB" => JText::_('MOD_SHCURRENCYCONVERTER_THAI_BAHT')." (THB)",
"TOP" => JText::_('MOD_SHCURRENCYCONVERTER_TONGA_PA-ANGA')." (TOP)",
"TTD" => JText::_('MOD_SHCURRENCYCONVERTER_TRINIDAD_AND_TOBAGO_DOLLAR')." (TTD)",
"TND" => JText::_('MOD_SHCURRENCYCONVERTER_TUNISIAN_DINAR')." (TND)",
"USD" => JText::_('MOD_SHCURRENCYCONVERTER_US_DOLLAR')." (USD)",
"AED" => JText::_('MOD_SHCURRENCYCONVERTER_UAE_DIRHAM')." (AED)",
"UGX" => JText::_('MOD_SHCURRENCYCONVERTER_UGANDAN_SHILLING')." (UGX)",
"UAH" => JText::_('MOD_SHCURRENCYCONVERTER_UKRAINIAN_HRYVNIA')." (UAH)",
"UYU" => JText::_('MOD_SHCURRENCYCONVERTER_URUGUAYAN_PESO')." (UYU)",
"VUV" => JText::_('MOD_SHCURRENCYCONVERTER_VANUATU_VATU')." (VUV)",
"VEF" => JText::_('MOD_SHCURRENCYCONVERTER_VENEZUELAN_BOLIVAR')." (VEF)",
"VND" => JText::_('MOD_SHCURRENCYCONVERTER_VIETNAM_DONG')." (VND)",
"YER" => JText::_('MOD_SHCURRENCYCONVERTER_YEMEN_RIYAL')." (YER)",
"ZMK" => JText::_('MOD_SHCURRENCYCONVERTER_ZAMBIAN_KWACHA')." (ZMK)",
"ZWD" => JText::_('MOD_SHCURRENCYCONVERTER_ZIMBABWE_DOLLAR')." (ZWD)"
	);
	asort($currencies);
	return $currencies;
}
?>
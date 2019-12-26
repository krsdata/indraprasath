<?php
/**
* ShCurrencyConverter module
* Autor: http://www.efxto.com
* Version: 1.0
* @license GNU/GPLv3,
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).'/helper.php');
$lib = dirname(__FILE__).'/libraries/shcurrencydata.php';
$document = &JFactory::getDocument();
$mosConfig_live_site = JURI::base();
$lib_base = $mosConfig_live_site."modules/mod_shcurrencyconverter";
$lib2 = "$lib_base/libraries/shcurrencydata.php";
$progress_gif = "$lib_base/assets/loading.gif";
$js_url = "$lib_base/assets/shcurrencyconverter.js";
$css_url = "$lib_base/assets/shcurrency.css";

$a = modShCurrencyConverterHelper::getContent($params);
$currency_from = $a->currency_from;
$currency_to = $a->currency_to;
$style = $a->style;

$script_vars = "var shcurrency_lib_url=\"$lib2\";
var shcurrency_progress_gif=\"$progress_gif\";
var shcurrency_style=\"$style\";";

$document->addScriptDeclaration($script_vars);
$document->addScript($js_url);
$document->addStyleSheet($css_url);

require(JModuleHelper::getLayoutPath('mod_shcurrencyconverter',$params->get('layout', 'default')));
?>
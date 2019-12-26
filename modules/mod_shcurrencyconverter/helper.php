<?php
/**
* ShCurrencyConverter module
* Autor: http://www.efxto.com
* Version: 1.0
* @license GNU/GPLv3,
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once (JPATH_SITE.'/components/com_content/helpers/route.php');

class modShCurrencyConverterHelper {
	function getContent(&$params) {
		$a = new stdClass;

		$a->currency_from = strval( $params->get( 'currency_from', 'USD') );
		$a->currency_to = strval( $params->get( 'currency_to', 'EUR') );
		$a->style = strval( $params->get( 'layout_op', 1) );

		return $a;
	}
}
<?php
/*
 * ARI Sexy Lightbox Lite Joomla! 1.5 plugin
 *
 * @package		ARI Sexy Lightbox Lite 
 * @version		1.0.0
 * @author		ARI Soft
 * @copyright	Copyright (c) 2009 www.ari-soft.com. All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
 * 
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
jimport('joomla.filter.filterinput');

require_once dirname(__FILE__) . '/arisexylightboxlite/kernel/class.AriKernel.php';

AriKernel::import('Web.JSON.JSONHelper');

class plgContentArisexylightboxlite extends JPlugin
{
	/*
	 * Constructor
	 */
	function plgContentArisexylightboxlite(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}
	
	function onContentPrepare($context, &$article, &$params)
	{
		$this->prepareContent($article, 'arisexylightboxlite');
	}
	
	function onPrepareContent(&$article, &$params, $limitstart)
	{
		$this->prepareContent($article);
	}
	
	function prepareContent($article, $folder = '')
	{
		static $loaded;

		if ($loaded)
			return ;
		
		$mainframe = JFactory::getApplication();

		$plgParams = $this->params;
		$rel = $plgParams->get('opt_find', 'sexylightbox');
		$loadAssets = $plgParams->get('loadAssets', 'auto');
		if ($loadAssets == 'auto' && !preg_match('/<[^>]*rel=("|\')?' . $rel . '(\[|"|\'| |\/)/i', $article->text))
			return ;

		$document =& JFactory::getDocument();
		$baseUri = JURI::root(true) . '/plugins/content/' . ($folder ? $folder . '/' : '') . 'arisexylightboxlite/js/';
		$loadJQuery = (bool)$plgParams->get('includeJQuery', false);
		$noConflict = (bool)$plgParams->get('noConflict', true);

		if ($loadJQuery)
		{
			$loadJQueryMethod = $plgParams->get('loadJQueryMethod', 'google_cdn');
			
			if ($loadJQueryMethod == 'local')
			{
				if (J3_0)
					JHtml::_('jquery.framework', $noConflict);
				else
					$document->addScript($baseUri . 'jquery.min.js');
			}
			else
			{
				$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
			}

			if ($noConflict)
			{
				if (!J3_0 || $loadJQueryMethod != 'local')
					$document->addScript($baseUri . 'jquery.noconflict.js');
			}			
		}

		$document->addScript($baseUri . 'jquery.easing.js');
		$document->addScript($baseUri . 'jquery.sexylightbox.min.js');
		
		$document->addStyleSheet($baseUri . 'sexylightbox.css');

		$jsOptions = $this->getOptions($folder);
		$document->addScriptDeclaration(
			sprintf('jQuery(document).ready(function(){ SexyLightbox.initialize(%s); });',
				$jsOptions ? AriJSONHelper::encode($jsOptions) : ''));
				
		$loaded = true;
	}

	function getOptions($folder = '')
	{
		$defOptions = array(
			'find' => 'sexylightbox',
			'zIndex' => 32000,
			'color' => 'black',
			'emergefrom' => 'top',
			'showDuration' => 200,
			'closeDuration' => 400,
			'moveDuration' => 1000,
			'moveEffect' => 'easeInOutBack',
			'resizeDuration' => 1000,
			'resizeEffect' => 'easeInOutBack',
			'shake' => array(
				'distance' => 10,
                'duration' => 100,
                'loops' => 2,
                'transition' => 'easeInOutBack'
			)
		);
		$options = $this->getParamOptions($defOptions);

		$options['dir'] = str_replace(' ', '%20', JURI::root(true) . '/plugins/content/' . ($folder ? $folder . '/' : '') . 'arisexylightboxlite/js/sexyimages');

		return $options;
	}
	
	function getParamOptions($defOptions, $prefix = 'opt_')
	{
		$plgParams = $this->params;
		$options = array();
		$filter = JFilterInput::getInstance(); 
		foreach ($defOptions as $key => $value)
		{
			if (is_array($value))
			{
				$subOptions = $this->getParamOptions($value, $prefix . $key . '_');
				if (count($subOptions) > 0)
					$options[$key] = $subOptions;
			}
			else
			{
				$paramValue = $plgParams->get($prefix . $key, $value);
				if ($paramValue !== $value)
				{
					$paramValue = $filter->clean($paramValue, gettype($value));
					if ($paramValue !== $value)
						$options[$key] = $paramValue;
				}
			}
		}
		
		return $options;
	}
}
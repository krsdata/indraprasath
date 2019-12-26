<?php
/***********************************************************************************
 * Stalker ---- Social Networking 'Stalker' module
 *
 * @version		V1.3.0
 * @author		Alain Rivest <info@aldra.ca>
 * @link		http://aldra.ca
 * @copyright 	Copyright (C) 2011 Alain Rivest. All rights reserved.
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU/GPL 
 * 
 * Before v1.3.0 :
 *   Nick Texidor <nick@texidor.com>
 *   http://www.nicktexidor.com
 *   Copyright (C) 2008-2011 Nick Texidor. All rights reserved.
 * 
 * Stalker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Stalker is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Stalker.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * See VERSIONS.TXT for full version history
 *
 **********************************************************************************/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');

// get parameters from the module's configuration
$iconsize	= $params->get('iconsize', '32');
$style		= $params->get('style', '0');
$position	= $params->get('position', 'left');
$usedb		= $params->get('usedb', '0');
$group		= $params->get('stalkergroup', '');
$imageset	= $params->get('imageset', 'default');

// Load the CSS file
JHTML::stylesheet('stalker.css', 'modules/mod_stalker/assets/css/', '');

// get the array of social networks from the helper
if ($usedb) {
	$img_path 	= StalkerHelper::getImagePathDB($iconsize, $imageset);
	$socnets 	= StalkerHelper::getSocialNetworksDB($group);
} else {
	$img_path 	= StalkerHelper::getImagePath($iconsize, $imageset);
	$socnets 	= StalkerHelper::getSocialNetworks();

	// get the various parameters from the Stalker Config
	foreach ($socnets as $socnet) {
		list($net, $txt, $url, $img) = $socnet;

		$net_name 		= $net . "name";

		$$net_name		= $params->get($net_name, '');
	}
}

require(JModuleHelper::getLayoutPath('mod_stalker'));

?>
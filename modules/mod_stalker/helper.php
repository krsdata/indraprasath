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
 
class StalkerHelper
{
    /**
     * Returns the image path
    */
    function getImagePath($size, $imageset = 'default')
    {
		if (($imageset == -1) || (trim($imageset) == '')) {
			$imageset = 'default';
		}

		// get the image path for the icons
		$img_path 	= "media/stalker/icons/" . $imageset . "/";
 
        return $img_path;
    }
 

    /**
     * Returns the image path
    */
    function getImagePathDB($size, $imageset = '')
    {
		// get the image set specified by component - commented as now at module level
		if (($imageset == -1) || (trim($imageset) == '')) {
			$params = &JComponentHelper::getParams('com_stalker');
			$imageset = $params->get('globalimageset', 'default');
		}

		$img_path 	= "media/stalker/icons/" . $imageset . "/";
 
        return $img_path;
    }
 

    /**
     * Returns a list of social networks
    */
    function getSocialNetworks()
    {
		// Set up the array of social networks
		$socnets = array (
			array ("bebo", 			"Bebo", 			"http://www.bebo.com/#id#",							"bebo.png"),
			array ("blinklist", 	"Blinklist", 		"http://www.blinklist.com/#id#", 					"blinklist.png"),
			array ("blogmarks", 	"Blogmarks", 		"http://blogmarks.net/user/#id#", 					"blogmarks.png"),
			array ("brightkite", 	"Brightkite", 		"http://brightkite.com/people/#id#", 				"brightkite.png"),
			array ("delicious", 	"del.icio.us", 		"http://del.icio.us/#id#", 							"delicious.png"),
			array ("digg", 			"Digg", 			"http://digg.com/users/#id#", 						"digg.png"),
			array ("diigo", 		"Diigo", 			"http://www.diigo.com/profile/#id#", 				"diigo.png"),
			array ("facebook", 		"Facebook",			"http://www.facebook.com/#id#", 					"facebook.png"),
			array ("facebookgrp", 	"Facebook Group", 	"http://www.facebook.com/group.php?gid=#id#", 		"facebook.png"),
			array ("facebookpage", 	"Facebook Page", 	"http://www.facebook.com/profile.php?id=#id#", 		"facebook.png"),
			array ("feedburner", 	"FeedBurner", 		"http://feeds.feedburner.com/#id#", 				"feedburner.png"),
			array ("flickr", 		"Flickr", 			"http://flickr.com/#id#", 							"flickr.png"),
			array ("friendfeed", 	"FriendFeed", 		"http://friendfeed.com/#id#", 						"friendfeed.png"),
			array ("friendster", 	"Friendster", 		"http://profiles.friendster.com/#id#", 				"friendster.png"),
			array ("googleplus", 	"Google+", 			"https://plus.google.com/#id#", 					"googleplus.png"),
            array ("hi5",           "Hi5",              "http://#id#.hi5.com/",                             "hi5.png"),
			array ("hyves", 		"Hyves", 			"http://#id#.hyves.nl/", 							"hyves.png"),
			array ("jaiku", 		"Jaiku", 			"http://#id#.jaiku.com/", 							"jaiku.png"),
			array ("kwippy", 		"Kwippy", 			"http://www.kwippy.com/#id#", 						"kwippy.png"),
			array ("lastfm", 		"LastFM", 			"http://www.last.fm/user/#id#", 					"lastfm.png"),
			array ("lastfmart", 	"LastFM Artist", 	"http://www.last.fm/music/#id#", 					"lastfm.png"),
			array ("linkedin", 		"Linked In", 		"http://www.linkedin.com/#id#", 					"linkedin.png"),
			array ("meetup", 		"Meet Up", 			"http://www.meetup.com/members/#id#/", 				"meetup.png"),
			array ("mefeedia", 		"MeFeedia", 		"http://www.mefeedia.com/#id#", 					"mefeedia.png"),
			array ("metacafe", 		"Metacafe", 		"http://www.metacafe.com/channels/#id#/", 			"metacafe.png"),
			array ("misterwong", 	"Mister Wong", 		"http://www.mister-wong.com/user/#id#/", 			"misterwong.png"),
			array ("myspace", 		"MySpace", 			"http://myspace.com/#id#", 							"myspace.png"),
			array ("netvibes", 		"Netvibes", 		"http://www.netvibes.com/#id#", 					"netvibes.png"),
			array ("newsvine", 		"Newsvine", 		"http://#id#.newsvine.com", 						"newsvine.png"),
			array ("ning", 			"Ning", 			"http://www.ning.com/#id#", 						"ning.png"),
			array ("orkut", 		"Orkut", 			"http://www.orkut.com/Main#Profile.aspx?uid=#id#", 	"orkut.png"),
			array ("photobucket", 	"Photo Bucket", 	"http://photobucket.com/users/#id#", 				"photobucket.png"),
			array ("picasa", 		"Picasa", 			"http://picasaweb.google.com/#id#", 				"picasa.png"),
			array ("plurk", 		"Plurk", 			"http://plurk.com/user/#id#", 						"plurk.png"),
			array ("qik", 			"Qik", 				"http://qik.com/#id#", 								"qik.png"),
			array ("reader", 		"Google Reader", 	"http://www.google.com/reader/shared/#id#", 		"reader.png"),
			array ("reddit", 		"Reddit", 			"http://www.reddit.com/user/#id#", 					"reddit.png"),
			array ("simpy", 		"Simpy", 			"http://www.simpy.com/user/#id#", 					"simpy.png"),
			array ("stumbleupon", 	"Stumble Upon",		"http://www.stumbleupon.com/stumbler/#id#/", 		"stumbleupon.png"),
			array ("technorati", 	"Technorati", 		"http://technorati.com/people/technorati/#id#", 	"technorati.png"),
			array ("tumblr", 		"Tumblr", 			"http://#id#.tumblr.com/", 							"tumblr.png"),
			array ("twitter", 		"Twitter", 			"http://twitter.com/#id#", 							"twitter.png"),
			array ("vimeo", 		"Vimeo", 			"http://www.vimeo.com/#id#", 						"vimeo.png"),
			array ("vox", 			"Vox", 				"http://#id#.vox.com/", 							"vox.png"),
			array ("xbox", 			"Xbox Live", 		"http://live.xbox.com/member/#id#", 				"xbox.png"),
			array ("xing", 			"Xing",	 			"http://www.xing.com/profile/#id#", 				"xing.png"),
			array ("youtube", 		"YouTube", 			"http://youtube.com/#id#", 							"youtube.png"),
			array ("extlink", 		"External Link", 	"http://#id#",			 							"extlink.png")
		);

        return $socnets;
    }


    /**
     * Returns a list of social networks
    */
    function getSocialNetworksDB($group)
    {
        // get a reference to the database
        $db = &JFactory::getDBO();

        $where = "WHERE s.published = 1 "; // Oops!!!  Thanks Gruz!

        if ((int)$group > 0) {
        	$where .= " AND groupid = " . $group;
        }

        // get a list of $userCount randomly ordered users 
		$query = " SELECT s.*, sn.name AS socnet, sn.url AS socneturl, sg.name AS groupname
	        	   FROM #__stalker AS s
	        	   LEFT JOIN #__stalker_socnets AS sn ON sn.id = s.socnetid 
	        	   LEFT JOIN #__stalker_groups  AS sg ON sg.id = s.groupid " .
	        	 $where .
				 " ORDER BY ordering "
        ;
 
        $db->setQuery($query);
        $items = ($items = $db->loadObjectList())?$items:array();
 
        return $items;
    }

}

?>
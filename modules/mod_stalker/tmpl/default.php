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
 
// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<div id="modstalker">
 <div id="modstalker<?php echo $position ?>">
  <ul>
<?php 

if ($usedb) {
    for ($i=0, $n=count( $socnets ); $i < $n; $i++)
    {
        $row 			=& $socnets[$i];
		$url	 		= str_replace("#id#", $row->username, $row->socneturl);
		$iid 			= str_replace(" ", "", $row->socnet);
		$target 		= "_blank";
		$linktitle		= (is_null($row->linktitle) || strlen(trim($row->linktitle)) == 0) ? $row->socnet . ": " . $row->username : $row->linktitle;
		$imagealt		= (is_null($row->imagealt) || strlen(trim($row->imagealt)) == 0) ? $row->socnet . ": " . $row->username : $row->imagealt;
		
		if (strlen(trim($row->target)) > 0) {
			$target = $row->target;
		}

		switch($style) {
			case 2:						
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $linktitle ?>" target="<?php echo $target ?>"><?php echo $row->socnet ?></a></li>
<?php 
				break;
			case 1:
				if ($position == "right") {
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $linktitle ?>" target="<?php echo $target ?>"><?php echo $row->socnet ?> <?php echo JHTML::image($img_path . $row->image, $imagealt, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?></a></li>
<?php 
				} else {
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $linktitle ?>" target="<?php echo $target ?>"><?php echo JHTML::image($img_path . $row->image, $imagealt, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?> <?php echo $row->socnet ?></a></li>
<?php 
				}
				break;
			case 0:
			default:
?>
	<li class="<?php echo $position ?>notext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $linktitle ?>" target="<?php echo $target ?>"><?php echo JHTML::image($img_path . $row->image, $imagealt, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?></a></li>
<?php 
				break;
		}
	}
} else {
	foreach ($socnets as $socnet) {
		list($net, $txt, $url, $img) = $socnet;

		$net_name 	= $net . "name";
	 
		if ($$net_name != "") {
			$url 		= str_replace("#id#", $$net_name, $url);
			$iid 		= str_replace(" ", "", $txt);
			$title		= $txt . ": " . $$net_name;

			switch($style) {
				case 2:						
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $title ?>" target="_blank"><?php echo $txt ?></a></li>
<?php 
					break;
				case 1:
					if ($position == "right") {
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $title ?>" target="_blank"><?php echo $txt ?> <?php echo JHTML::image($img_path . $img, $title, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?></a></li>
<?php 
					} else {
?>
	<li class="<?php echo $position ?>withtext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $title ?>" target="_blank"><?php echo JHTML::image($img_path . $img, $title, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?> <?php echo $txt ?></a></li>
<?php 
					}
					break;
				case 0:
				default:
?>
	<li class="<?php echo $position ?>notext"><a href="<?php echo $url ?>" rel="nofollow" title="<?php echo $title ?>" target="_blank"><?php echo JHTML::image($img_path . $img, $title, 'width="' . $iconsize . '" height="' . $iconsize . '" id="' . $iid . '" style="width:' . $iconsize . 'px; height:' . $iconsize . 'px;" '); ?></a></li>
<?php 
					break;
			}
		}
	}
}

?>
  </ul>
 </div>
 <div class="clear"></div>
</div>

<?php

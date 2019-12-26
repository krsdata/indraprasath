<?php
/*
# ------------------------------------------------------------------------
# JA Methys Template for Joomla 1.6
# ------------------------------------------------------------------------
# Copyright (C) 2004-2009 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
# ------------------------------------------------------------------------
*/ 

defined('_JEXEC') or die('Restricted access'); 
$rtl = 0;
if (class_exists('T3Common')) $rtl = T3Common::isRTL();
$padding_prop = $rtl?'padding-right':'padding-left';
?>
<div class="ja-bulletin">
	<ul class="ja-bulletin<?php echo $params->get('moduleclass_sfx'); ?> clearfix">
	<?php if(!empty($list)): ?>
	<?php foreach ($list as $item) : ?>
		<li>
				<?php 
				$padding = ($params->get( 'show_image'))?"style=\"$padding_prop:".($params->get('width')+10)."px\"":"";
				if (isset($item->image)) : 
				?>
				<?php if( $item->image ) : ?>
					<a href="<?php echo $item->link; ?>" class="mostread<?php echo $params->get('moduleclass_sfx'); ?>-image">
						<?php echo $item->image; ?>
					</a>
				<?php endif; ?>
				<?php endif; ?>
				<div <?php echo $padding;?>>
				<a href="<?php echo $item->link; ?>" class="mostread<?php echo $params->get('moduleclass_sfx'); ?>"><?php echo $item->text; ?></a>
				<?php if (isset($item->date)) : ?>
				<br /><span><?php echo JHTML::_('date', $item->date, JText::_('DATE_FORMAT_LC4')); ?></span>
				<?php endif; ?>
				</div>

		</li>
	<?php endforeach; ?>
	<?php endif; ?>
	</ul>
</div>
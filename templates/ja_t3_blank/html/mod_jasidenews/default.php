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
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="ja-sidenews-list clearfix">
	<?php foreach( $list as $item ) : 
		
		if( $showdate) {
			$item->date =  strtotime ( $item->modified ) ? $item->created : $item->modified;
		}
		if(isset($item->text)){
			$item->text = $item->introtext . $item->text;
		}else{
			$item->text = $item->introtext;	
		}
		
	?>
		<div class="ja-slidenews-item">

			<a class="ja-title" href="<?php echo  $item->link; ?>"><?php echo  $helper->trimString( $item->title, $titleMaxChars );?></a>
			 
		  <?php if( $showimage ):  ?>
  		  	<?php echo $helper->renderImage ($item, $params, $descMaxChars, $iwidth, $iheight ); ?>
		  <?php endif; ?>
		  <?php if (isset($item->date)) : ?>
				<span class="ja-createdate clearfix">
					<?php
						$created = JHTML::_('date', $item->date, JText::_('DATE_FORMAT_LC2')); ?>
						<!-- Date created -->
							<?php 
								$createDay = date('d', strtotime( $created));
								$createMonth = date('M', strtotime( $created));
								$createYear = date('Y', strtotime( $created));
							?>
							<span class="date"><?php echo $createDay; ?></span>
							<span class="month"><?php echo $createMonth; ?></span>
							<span class="year"><?php echo $createYear; ?></span>
				</span>
			<?php endif; ?>
			<p>
			<?php echo $helper->trimString( strip_tags($item->introtext), $descMaxChars); ?>
			</p>
		  <?php if( $showMoredetail ) : ?>
		  <a class="readon" href="<?php echo  $item->link; ?>"> <?php echo JTEXT::_("MORE_DETAIL"); ?></a>
		  <?php endif;?>
		  
		</div>
  <?php endforeach; ?>
</div>
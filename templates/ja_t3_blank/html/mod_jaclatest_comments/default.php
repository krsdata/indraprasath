<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if($list):?>
<div id="jac-lasmod<?php echo $module->id;?>" class="jac-lasmod">	
	<div class="ja-box-ct clearfix">
	<ul class="jac-lasmod-main">		
		<?php foreach ($list as $item):?>
		<li class="jac-has-layout">
			<?php if($params->get("show_content_title",1)):?>
				<h4 class="jac-lasmod-title">
					<a href="<?php echo $item->referer;?>" title="<?php echo $item->contenttitle;?>">
					<?php echo $item->contenttitle;?><?php if($params->get("showcommentcount",1)):?>(<?php echo $item->commentcount;?>)<?php endif;?>
					</a>
				</h4>
			<?php endif;?>
			<?php if($params->get("avatar", "1")):?>						
				<img alt="" src="<?php echo $item->avatar[0];?>" style="<?php echo $item->avatar[1];?>" />				
			<?php endif;?>
			<?php if($params->get("show_author_info",1)):?>
				<span class="jac-lasmod-author"><?php echo $item->author_info;?><span><?php echo JText::_(' Said'); ?> :</span></span>
			<?php endif;?>
			<?php if($params->get("show_date",1)):?>
				<span class="jac-lasmod-time"><?php echo $item->date;?></span>
			<?php endif;?>
									
			<?php if($params->get("showcontent",1)):?>
				<p class="jac-lasmod-title">
					<?php echo $item->comment;?>
				</p>
			<?php endif;?>
			<?php if($params->get("show_vote",1)):?>
				<p class="jac-lasmod-vote">
					<?php echo JText::_("Number of vote:").$item->voted;?>
				</p>
			<?php endif;?>														
		</li>	
		<?php endforeach;?>				
	</ul>	
	</div>
</div>				
<?php endif;?>    
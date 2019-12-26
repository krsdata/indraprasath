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

<div class="ja-extrafields-box clearfix">
	<h3><?php echo JTEXT::_("Additional Info")?></h3>
	<ul class="ja-extrafields">
	<?php foreach ($this->article_params as $f_name => $f_value){
		if(in_array($f_name, $this->ext_params) && $f_value!=''){?>
			<li class="item">
				<span class="ex-value"><strong><?php echo $f_name?> :</strong></span> <span class="ex-label"><?php echo $f_value?></span>
			</li>
		<?php }?>
	<?php }?>
	</ul>
</div>
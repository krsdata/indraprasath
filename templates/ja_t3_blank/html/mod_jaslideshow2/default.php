<div class="ja-slidewrap<?php echo $skin_name;?>" id="ja-slide-<?php echo $module->id;?>" style="visibility:hidden">
  <div class="ja-slide-main-wrap">
    <div class="ja-slide-main">
      <?php for ($i=0;$i<count($images); $i++) {?>
      <div class="ja-slide-item"><img src="<?php echo $folder.$images[$i];?>"  alt="<?php echo str_replace('"', '"/', strip_tags($captionsArray[$i]) );?>"/>
      <?php if ($showdescwhen == 'always' && $captionsArray[$i]):?><div class="ja-slide-desc"><?php echo $captionsArray[$i];?></div><?php endif; ?>
      </div>						
      <?php }?>
    </div>		
  <?php if ( $animation=='move' && $container ) :?>  
    <div class="but_prev ja-slide-prev"></div>
    <div class="but_next ja-slide-next"></div>
  <?php endif; ?>
  <div class="maskDesc"><div class="inner"><?php if ($showDescription=='desc' && $readmoretext!=''){?><a class="readon" title=""><span><?php echo $readmoretext;?></span></a><?php }?></div></div>
  </div>
  
  <?php if($showDescription && $showdescwhen!='always'){?>
  <div class="ja-slide-descs">
    <?php foreach($captionsArray as $desc) {?>
      <div class="ja-slide-desc"><?php echo $desc?></div>					
    <?php }?>					
  </div>
  <?php }?>
  
  <?php if ($navigation): ?>
  <div class="ja-slide-mask">
  </div>
  <div class="ja-slide-thumbs-wrap<?php echo $classNav;?>">
    <div class="ja-slide-thumbs">
      <?php for ($i=0;$i<count($images); $i++) {?>
        <div class="ja-slide-thumb">
        <?php if ($navigation=='thumbs'){?><img src="<?php echo $thumbArray[$i]?>" alt="Photo Thumb" />
        <?php }else{?><span><?php echo ($i+1);?></span><?php } ?>
        </div>
      <?php }?>							
    </div>

    <div class="ja-slide-thumbs-mask"><span class="ja-slide-thumbs-mask-left">&nbsp;</span><span class="ja-slide-thumbs-mask-center">&nbsp;</span><span class="ja-slide-thumbs-mask-right">&nbsp;</span></div>

    <p class="ja-slide-thumbs-handles">
      <?php for ($i=0;$i<count($images); $i++) {?>
        <span>&nbsp;</span>
      <?php }?>						
    </p>
  </div>
  <?php endif; ?>
  
  <?php if ($control): ?>
  <div class="ja-slide-buttons clearfix">
     <span class="ja-slide-prev">&laquo; <?php echo JText::_('PREVIOUS');?></span>
    <span class="ja-slide-playback">&lsaquo; <?php echo JText::_('PLAYBACK');?></span>
    <span class="ja-slide-stop"><?php echo JText::_('STOP');?></span>
    <span class="ja-slide-play"><?php echo JText::_('PLAY');?> &rsaquo;</span>
    <span class="ja-slide-next"><?php echo JText::_('NEXT');?>  &raquo;</span>
  </div>
  <?php endif; ?>
</div>


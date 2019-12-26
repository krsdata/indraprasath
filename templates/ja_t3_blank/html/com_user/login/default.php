<?php


defined( '_JEXEC' ) or die( 'Restricted access' );
 ?>
<?php if($this->params->get('show_page_title',1)) : ?>
<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>"><span><?php $string = $this->escape($this->params->get('page_title'));
$string = preg_replace('/(?<=\>)\b(\w*)\b|^\w*\b/', '<span class="first_h1">$0</span>', $string);

echo $string ?></span></h1>
<?php endif; ?>

<?php echo $this->loadTemplate( $this->type );

<?php


defined('_JEXEC') or die('Restricted access');
?>

<h1 class="componentheading"><span><?php $string = $this->escape($this->message->title); 
$string = preg_replace('/(?<=\>)\b(\w*)\b|^\w*\b/', '<span class="first_h1">$0</span>', $string);

echo $string ?></span></h1>

<div class="message">
	<?php echo $this->escape($this->message->text); ?>
</div>

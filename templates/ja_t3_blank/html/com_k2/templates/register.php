<?php
/**
 * @version		$Id: register.php 478 2010-06-16 16:11:42Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<script type="text/javascript">
	//<![CDATA[
	window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value){
			return ($('password').value == value);
		});
	});
	//]]>
</script>

<!-- K2 user register form -->

<?php if(isset($this->message)) $this->display('message'); ?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" enctype="multipart/form-data" method="post" id="josForm" name="josForm" class="form-validate ja-typo-form">

  <?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
  <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
  	<?php $string = $this->escape($this->params->get('page_title'));
$string = preg_replace('/(?<=\>)\b(\w*)\b|^\w*\b/', '<span class="first_h1">$0</span>', $string);

echo $string  ?>
  </div>
  <?php endif; ?>

  <div id="k2Container" class="k2AccountPage">
	  	<p class="form-des clearfix"><?php echo JText::_( 'Account details' ); ?></p>
	  	<p class="name clearfix">
				<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?> * </label>
	      <input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' )); ?>" class="inputbox required" maxlength="50" />
	    </p>
	    <p class="user clearfix">
				<label id="usernamemsg" for="username"><?php echo JText::_( 'User name' ); ?> * </label>
				<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' )); ?>" class="inputbox required validate-username" maxlength="25" />
	    </p>
	    <p class="email clearfix">
				<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?> * </label>
				<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' )); ?>" class="inputbox required validate-email" maxlength="100" />
	    </p>
	    <p class="pass clearfix">
				<label id="pwmsg" for="password"><?php echo JText::_( 'Password' ); ?> * </label>
				<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" />
	    </p>
	    <p class="verify_pass clearfix"><label id="pw2msg" for="password2"><?php echo JText::_( 'Verify Password' ); ?> * </label>
			<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" />
	    </p>
	  	<p class="form-des"><?php echo JText::_( 'Personal details' ); ?></p>
			<!-- K2 attached fields -->
	    <p class="urgender clearfix">
					<label id="gendermsg" for="gender"><?php echo JText::_( 'Gender' ); ?></label>
	     		<?php echo $this->lists['gender']; ?>
	    </p>
	    <p class=" clearfix"><label id="descriptionmsg" for="description"><?php echo JText::_( 'Description' ); ?></label>
					<?php echo $this->editor; ?>
			</p>
	    <p class=" clearfix"><label id="imagemsg" for="image"><?php echo JText::_( 'User image (avatar)' ); ?></label>
					<input type="file" id="image" name="image"/>
	        <?php if ($this->K2User->image): ?>
	        <img class="k2AdminImage" src="<?php echo JURI::root().'media/k2/users/'.$this->K2User->image; ?>" alt="<?php echo $this->user->name; ?>" />
	        <input type="checkbox" name="del_image" id="del_image" />
	        <label for="del_image"><?php echo JText::_('Check this box to delete current image or just upload a new image to replace the existing one'); ?></label>
	        <?php endif; ?>
	    </p>
	    <p class="urgender clearfix">
			<label id="urlmsg" for="url"><?php echo JText::_( 'URL' ); ?></label>
			<input type="text" size="50" value="<?php echo $this->K2User->url; ?>" name="url" id="url"/>
		</p>
	    <?php if(count(array_filter($this->K2Plugins))): ?>
	    <!-- K2 Plugin attached fields -->
	  	<p class="form-des"><?php echo JText::_( 'Additional details' ); ?></p>
	    <?php foreach ($this->K2Plugins as $K2Plugin):?>
	    <?php if(!is_null($K2Plugin)): ?>
	    <p><?php echo $K2Plugin->fields; ?></p>
	    <?php endif;?>
	    <?php endforeach; ?>
	    <?php endif; ?>
	  <div class="k2AccountPageNotice"><?php echo JText::_( 'REGISTER_REQUIRED' ); ?></div>

	  <div class="k2AccountPageUpdate">
	  	<button class="button validate" type="submit">
	  		<?php echo JText::_('Register'); ?>
	  	</button>
	  </div>

  </div>

  <input type="hidden" name="task" value="register_save" />
  <input type="hidden" name="id" value="0" />
  <input type="hidden" name="gid" value="0" />
  <input type="hidden" name="K2UserForm" value="1" />
  <?php echo JHTML::_( 'form.token' ); ?>

</form>

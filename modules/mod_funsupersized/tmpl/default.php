<?php
/*------------------------------------------------------------------------
# mod_funsupersized - Fun Supersized
# ------------------------------------------------------------------------
# author All For Coding
# copyright Copyright (C) All For Coding. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.all4coding.com
# Technical Support:  http://www.all4coding.com
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$slidePath = trim($params->get('slide_path', '/'));
if ($slidePath == '' || !file_exists(JPATH_ROOT.DS.$slidePath)) {
    echo '<div class="fun_supersized_error">'.JText::_('MOD_FUNSUPERSIZED_ERROR_INVALID_SLIDE_PATH').'</div>';
    return;
}

jimport('joomla.filesystem.folder');
$slides = array();
if (is_dir(JPATH_ROOT.DS.$slidePath)) {
    $files = JFolder::files(JPATH_ROOT.DS.$slidePath, '(.\.jpg)|(.\.png)');
    if (empty($files)) {
        echo '<div class="fun_supersized_error">'.JText::_('MOD_FUNSUPERSIZED_ERROR_SLIDE_PATH_DONT_HAVE_IMAGE').'</div>';
        return;
    }
    foreach($files as $file) {
        $slide = new stdClass();
        $slide->image = JURI::root().$slidePath.'/'.$file;
        $slides[] = $slide;
    }
} else {
    $handle = fopen(JPATH_ROOT.DS.$slidePath, 'r');
    if (!$handle) {
       echo '<div class="fun_supersized_error">'.JText::_('MOD_FUNSUPERSIZED_ERROR_CANNOT_READ_SLIDE_LIST').'</div>';
    }
    
    $line = 1;
    while (($buffer = fgets($handle)) !== false) {
        if (trim($buffer) == '') {
            continue;
        }
        $slide = json_decode($buffer);
        if ($slide && $slide->image) {
            $slides[] = $slide;
        } else {
            echo '<div class="fun_supersized_error">'.JText::sprintf('MOD_FUNSUPERSIZED_ERROR_SLIDE_LIST_LINE_INVALID', $line).'</div>';
        }
        $line++;
    }
    if (empty($slides)) {
        echo '<div class="fun_supersized_error">'.JText::_('MOD_FUNSUPERSIZED_ERROR_SLIDE_LIST_EMPTY').'</div>';
        return;
    }
}

$options = new stdClass();
$options->autoplay              = (int)$params->get('autoplay', 1);
$options->fit_always            = (int)$params->get('fit_always', 0);
$options->fit_landscape         = (int)$params->get('fit_landscape', 0);
$options->fit_portrait          = (int)$params->get('fit_portrait', 1);
$options->horizontal_center     = (int)$params->get('horizontal_center', 0);
$options->vertical_center       = (int)$params->get('vertical_center', 1);
$options->image_protect         = (int)$params->get('image_protect', 1);
$options->keyboard_nav          = (int)$params->get('keyboard_nav', 1);
$options->min_height            = (int)$params->get('min_height', 0);
$options->min_width             = (int)$params->get('min_width', 0);
$options->new_window            = (int)$params->get('new_window', 1);
$options->pause_hover           = (int)$params->get('pause_hover', 0);
$options->performance           = (int)$params->get('performance', 1);
$options->random                = (int)$params->get('random', 0);
$options->slideshow             = (int)$params->get('slideshow', 1);
$options->slide_interval        = (int)$params->get('slide_interval', 5000);
$options->slide_links           = $params->get('slide_links', 1) ? $params->get('slide_links', 1) : false;
$options->start_slide           = (int)$params->get('start_slide', 1);
$options->stop_loop             = (int)$params->get('stop_loop', 0);
$options->thumb_links           = (int)$params->get('thumb_links', 1);
$options->thumbnail_navigation  = (int)$params->get('thumbnail_navigation', 1);
$options->transition            = (int)$params->get('transition', 1);
$options->transition_speed      = (int)$params->get('transition_speed', 750);
$options->arrow_navigation      = (int)$params->get('arrow_navigation', 1);
$options->progress_bar          = (int)$params->get('progress_bar', 1);
$options->mouse_scrub           = (int)$params->get('mouse_scrub', 1);
$options->play_button           = (int)$params->get('play_button', 1);
$options->slide_counter         = (int)$params->get('slide_counter', 1);
$options->slide_caption         = (int)$params->get('slide_caption', 1);

$options->slides                = $slides;

if (version_compare(JVERSION,'3.0.0','<')) {
    JHTML::stylesheet('supersized.css', 'media/mod_funsupersized/css/');
    JHTML::stylesheet('supersized.shutter.css', 'media/mod_funsupersized/css/');
    $document = JFactory::getDocument();
    $document->addStyleDeclaration('.fun_supersized_error {background: #F00; color: #FFF; font-weight: bold;}');
    
    if ($params->get('load_jquery', 0)) {
        JHtml::script('jquery-1.6.4.js', 'media/mod_funsupersized/js/', false);
    }
    JHTML::script('jquery.easing.min.js', 'media/mod_funsupersized/js/', false);
    JHTML::script('supersized.3.2.7.js', 'media/mod_funsupersized/js/', false);
    JHTML::script('supersized.shutter.js', 'media/mod_funsupersized/js/', false);
    JHTML::script('default.js', 'media/mod_funsupersized/js/', false);
} else {
    JHTML::stylesheet('mod_funsupersized/supersized.css', false, true);
    JHTML::stylesheet('mod_funsupersized/supersized.shutter.css', false, true);
    JHTML::stylesheet('mod_funsupersized/default.css', false, true);
    $document = JFactory::getDocument();
    $document->addStyleDeclaration('.fun_supersized_error {background: #F00; color: #FFF; font-weight: bold;}');
    
    if ($params->get('load_jquery', 0)) {
        JHtml::script('mod_funsupersized/jquery-1.6.4.js', false, true);
    }
    JHTML::script('mod_funsupersized/jquery.easing.min.js', false, true);
    JHTML::script('mod_funsupersized/supersized.3.2.7.js', false, true);
    JHTML::script('mod_funsupersized/supersized.shutter.js', false, true);
    JHTML::script('mod_funsupersized/default.js', false, true);
}
?>
<script type="text/javascript">
    supersizedImgPath = '<?php echo JURI::base().'media/mod_funsupersized/img/'; ?>';
    supersizedOptions = <?php echo json_encode($options); ?>;
</script>
jQuery.noConflict();
jQuery(function() {
	if (typeof supersizedOptions == 'undefined' || !supersizedOptions) {
		jQuery('#supersized-loader').remove();
		jQuery('#supersized').remove();
		return;
	}
	if (supersizedOptions.thumbnail_navigation) {
		jQuery('body').append('<div id="prevthumb"></div>');
		jQuery('body').append('<div id="nextthumb"></div>')
	}
	if (supersizedOptions.arrow_navigation) {
		jQuery('body').append('<a id="prevslide" class="load-item"></a><a id="nextslide" class="load-item"></a>');
	}
	if (supersizedOptions.thumb_links || supersizedOptions.play_button || supersizedOptions.slide_counter || supersizedOptions.slide_caption) {
		// Thumb Tray
		if (supersizedOptions.thumb_links) {
			jQuery('body').append('<div id="thumb-tray" class="load-item"><div id="thumb-back"></div><div id="thumb-forward"></div></div>');
		}
		if (supersizedOptions.progress_bar) {
			// Time Bar
			jQuery('body').append('<div id="progress-back" class="load-item"><div id="progress-bar"></div></div>');
		}
		// Control Bar
		jQuery('body').append('<div id="controls-wrapper" class="load-item"><div id="controls"></div></div>');
		if (supersizedOptions.play_button) {
			jQuery('#controls').append('<a id="play-button"><img id="pauseplay" src="' + supersizedImgPath + 'pause.png"/></a>');
		}
		if (supersizedOptions.slide_counter) {
			jQuery('#controls').append('<div id="slidecounter"><span class="slidenumber"></span> / <span class="totalslides"></span></div>')
		}
		if (supersizedOptions.slide_caption) {
			jQuery('#controls').append('<div id="slidecaption"></div>')
		}
		if (supersizedOptions.thumb_links) {
			jQuery('#controls').append('<a id="tray-button"><img id="tray-arrow" src="' + supersizedImgPath + 'button-tray-up.png"/></a>');
		}
		if (supersizedOptions.slide_links) {
			jQuery('#controls').append('<ul id="slide-list"></ul>');
		}
	}
	
	jQuery.supersized(supersizedOptions);
	vars.image_path = supersizedImgPath;
});
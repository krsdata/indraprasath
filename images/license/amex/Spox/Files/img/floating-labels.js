$.fn.autocompletecheck = function (callback) {
	var $this = this;
	var last = "";
	var infunc = function () {
		var text = $this.val();
		if (text != last) {
			last = text;
			$this.trigger("checkValue");
		}
		setTimeout(infunc, 100);
	}
	setTimeout(infunc, 100);
};

bindFloatingLabels = function () {
	
	var labelMinClass = "label-min";
	var labelMinForceClass = "label-min-force";

/*	if (Modernizr.inputtypes.date) {
		$("div.field input[type=date]").each(function () {
			$(this).addClass(labelMinForceClass);
		});
	}
*/
	/* Prevent selection of label text */
	$("div.field label[for]").each(function () {
		$(this).on('click dblclick', function(e) {
			e.preventDefault();
			e.target.nextSibling.focus(); 	
		});
	});
	
	
	

	// Ignore spaces and commas for number fields
	$("input[type=number],input[type=tel]").keypress(function (e) {
		if (e.which == 32 || e.which == 44) {
			return false;
		}
		return true;
	}).on("paste", function(e) {
		e.preventDefault();
		var clipboardData = e.originalEvent.clipboardData || window.clipboardData;
		var pastedText = clipboardData.getData('Text');
		var fieldValue = pastedText.replace(/\s|,/g, '');
		var maxLength = $(this).attr("maxLength");
		if (maxLength) {
			this.value = fieldValue.substring(0, maxLength);
		} else {
			this.value = fieldValue;
		}
	});
	
	
	$("input[type=text], input[type=number], input[type=tel], input[type=date], input[type=email], input[type=password], textarea, select").bind("checkValue", function () {
		var $this = $(this);
		var $label = $this.prev("label");
		//invalidMatches = this.matches ? this.matches(":invalid") : this.msMatchesSelector(":invalid");
		
		if (this.value !== "" || (this.value !== "" && this.value !== "___-__-____" && this.value !== "__/__/____") || $("option:selected", this).text() != "" || $this.hasClass(labelMinForceClass) || $this.hasClass("addressAutoComplete")) {
			$label.addClass(labelMinClass);
		} else {
			$label.removeClass(labelMinClass);
		}
	}).on("keyup", function () {
		var $this = $(this);
	
	}).on("focus", function () {
		var $this = $(this);
		$this.prev("label").addClass(labelMinClass);
		
	}).on("blur", function () {
		var $this = $(this);
		$this.trigger("checkValue");
		
	}).change(function () {
		$(this).trigger("checkValue");
	}).trigger("checkValue");


	$("div.field:has(.fieldError)").addClass("fieldError");

	$("input.autocompletecheck").autocompletecheck();
}

	$(document).ready(bindFloatingLabels);

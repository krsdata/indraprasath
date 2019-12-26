window.onload = shcurrency_prepareForm;

function shcurrency_prepareForm() {
	if(!document.getElementById) {
		return;
	}
	if(!document.getElementById("shcurrency_form")) {
		return;
	}
	document.getElementById("shcurrency_form").onsubmit = function() {
		var data = "";
		for (var i=0; i<this.elements.length; i++) {
			data+= this.elements[i].name;
			data+= "=";
			data+= escape(this.elements[i].value);
			data+= "&";
		}
		data+= "process=1";
		return !shcurrency_sendData(data);
	};
}

function shcurrency_sendData(data) {
	var request_shcurrency = shcurrency_getHTTPObject();
	if (request_shcurrency) {
		shcurrency_displayLoading_org(document.getElementById("shcurrency_loading"));
		var params = data;
		var url = shcurrency_lib_url;
		request_shcurrency.open( "POST", url, true );
		request_shcurrency.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
		request_shcurrency.onreadystatechange = function() {
			shcurrency_parseResponse(request_shcurrency);
		};
                request_shcurrency.send(params);

		return true;
	} else {
		return false;
	}
}

function shcurrency_parseResponse(request) {
	if (request.readyState == 4) {
		if (request.status == 200 || request.status == 304) {
			var container = document.getElementById("shcurrency_container");
			container.innerHTML = request.responseText;
			shcurrency_fadeUpErrors(container);
			shcurrency_prepareForm();
		}
	}
}

function shcurrency_getHTTPObject() {
	var xhr = false;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		try {
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e) {
				xhr = false;
			}
		}
	}
	return xhr;
}

function shcurrency_displayLoading_org(element) {
	var image = document.createElement("img");
	image.setAttribute("src", shcurrency_progress_gif);
	image.setAttribute("alt","Loading...");
	image.setAttribute("align","middle");
	element.appendChild(image);
}

function shcurrency_fadeUp(element,red,green,blue) {
	if (element.fade) {
		clearTimeout(element.fade);
	}
	element.style.backgroundColor = "rgb("+red+","+green+","+blue+")";
	if (red == 255 && green == 255 && blue == 255) {
		return;
	}
	var newred = red + Math.ceil((255 - red)/10);
	var newgreen = green + Math.ceil((255 - green)/10);
	var newblue = blue + Math.ceil((255 - blue)/10);
	var repeat = function() {
		fadeUp(element,newred,newgreen,newblue)
	};
	element.fade = setTimeout(repeat,100);
}

function shcurrency_fadeUpErrors(element) {
	var messages = element.getElementsByTagName("strong");
	for (var i=0; i<messages.length; i++) {
		if (messages[i].className == "error") {
			fadeUp(messages[i],255,153,153);
		}
	}
}
//Window
(function (window, document, undefined) {
	var isWindowOpen = false;
	var windowAnimationTime = 200; //ms
	
	_construct();
	
	//Cleans up the code a lil 
	function _construct() {
		//Bind all toggles
		var windowOpenNodes = document.getElementsByClassName("window-open");
		for (var i = 0; i < windowOpenNodes.length; i++)
			windowOpenNodes[i].onclick = windowOpenOnClick;
		
		var windowCloseNodes = document.getElementsByClassName("window-close");
		for (var i = 0; i < windowCloseNodes.length; i++) {
			windowCloseNodes[i].onclick = function() {
				windowClose(this);
			}
		}
	}
	
	/**
	 * Simply opens the one that it says it opens.
	 */
	function windowOpenOnClick() {
		if (!this.attributes["data-window"])
			return;
		
		//Check for pointer to window
		var hoverWindow = document.getElementById("window-" 
				+ this.attributes["data-window"].value);
		if (!hoverWindow)
			return;
		
		//Close opened windows
		var openWindows = document.querySelectorAll(".window.open");
		for (var i = 0; i < openWindows.length; i++)
			windowClose(openWindows[i]);
		
		//un-activate other tabs
		var openTabs = document.querySelectorAll(".window-open.active");
		for (var i = 0; i < openTabs.length; i++)
			openTabs[i].classList.remove("active");
		
		//Animate in window, delay if one is open
		if (isWindowOpen)
			setTimeout(function() { openWindow(hoverWindow); }, windowAnimationTime);
		else
			openWindow(hoverWindow);
		
		//Actiate tab
		this.classList.add("active");
	}
	
	function openWindow(window) {
		window.classList.add("open");
		isWindowOpen = true;
	}
	
	/**
	 * Recursively checks parent if its a hover-window and if so, closes it.
	 */
	function windowClose(node) {
		if (node == null || node == document || node == document.body)
			return;
		
		if (node.classList.contains("window")) {
			node.classList.remove("open");
			//Delay the close flag because fuck javascript.
			setTimeout(function() { isWindowOpen = false; },
					windowAnimationTime / 2);
			return;
		}
		
		windowClose(node.parentNode);
	}
	
} (this, document));

//sidebars
(function (window, document, undefined) {
	
	_construct();
	
	function _construct() {
		//Bind toggles
		var sidebarOpenNodes = document.getElementsByClassName("menu-open");
		for (var i = 0; i < sidebarOpenNodes.length; i++) 
			sidebarOpenNodes[i].onclick = sidebarOpenClick;
		
		var sidebarCloseNodes = document.getElementsByClassName("menu-close");
		for (var i = 0; i < sidebarCloseNodes.length; i++)
			sidebarCloseNodes[i].onclick = function() { sidebarClose(this); }
	}
	
	function sidebarOpenClick() {
		if (!this.attributes["data-menu"])
			return;
		
		var menu = document.getElementById("menu-" 
				+ this.attributes["data-menu"].value);
		if (!menu)
			return;
		
		menu.classList.add("open");
	}
	
	function sidebarClose(node) {
		if (node == null || node == document || node == document.body)
			return;
		
		if (node.classList.contains("sidebar")) {
			node.classList.remove("open");
			return;
		}
		
		sidebarClose(node.parentNode);
	}
	
} (this, document));
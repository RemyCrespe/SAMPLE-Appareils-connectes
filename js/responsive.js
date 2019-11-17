function XLViewport() {
	
		var SiteW = 1300 // Largeur du site source ;
		var SiteH = 640 // Hauteur du site source ;
	
		var ScreenW = getWindowWidth() ;
		var ScreenH = getWindowHeight() ;
		
		// Je veux que le site fit en fonction de sa hauteur
		
		PercentH = 100 ;
		if (SiteH > ScreenH)
		PercentH = (ScreenH * 100) / SiteH ;

		PercentW = 100 ;
		if (SiteW > ScreenW)
		PercentW = (ScreenW * 100) / SiteW ;
		
		if (PercentW <= PercentH) Percent = PercentW ;
		else Percent = PercentH ;
		
		Scale = Percent / 100 ;
		
		FFrame = document.getElementById('FSite') ;
		FFrame.style['-webkit-transform'] = 'scale(' + Scale + ')';
		FFrame.style['-moz-transform'] = 'scale(' + Scale + ')';			
		FFrame.style['-ms-transform'] = 'scale(' + Scale + ')' ;
		FFrame.style['transform'] = 'scale(' + Scale + ')';
		
	}
	
	function getWindowHeight() {
		var windowHeight=0;
		if (typeof(window.innerHeight)=='number') {
			windowHeight=window.innerHeight;
		}
		else {
		 if (document.documentElement&&
		   document.documentElement.clientHeight) {
			 windowHeight = document.documentElement.clientHeight;
		}
		else {
		 if (document.body&&document.body.clientHeight) {
			 windowHeight=document.body.clientHeight;
		  }
		 }
		}
		return windowHeight;
	}

	function getWindowWidth() {
		var windowWidth=0;
		if (typeof(window.innerWidth)=='number') {
			windowWidth=window.innerWidth;
		}
		else {
		 if (document.documentElement&&
		   document.documentElement.clientWidth) {
			 windowWidth = document.documentElement.clientWidth;
		}
		else {
		 if (document.body&&document.body.clientWidth) {
			 windowWidth=document.body.clientWidth;
		  }
		 }
		}
		return windowWidth;
	}
	

	window.onload = function(){
		XLViewport() ;
	};
	
	window.onresize = function(){
		XLViewport() ;
	};
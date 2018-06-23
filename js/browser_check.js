
			//This is the function to check for a mobile device:
			function isMobile() {
				return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent );
			}
			function BrowserCheck() {
				// Opera 8.0+
				var isOpera = ( !!window.opr && !!opr.addons ) || !!window.opera || navigator.userAgent.indexOf( ' OPR/' ) >= 0;
				// Firefox 1.0+
				var isFirefox = typeof InstallTrigger !== 'undefined';
				// Safari 3.0+ "[object HTMLElementConstructor]" 
				var isSafari = /constructor/i.test( window.HTMLElement ) || ( function ( p ) {
					return p.toString() === "[object SafariRemoteNotification]";
				} )( !window[ 'safari' ] || ( typeof safari !== 'undefined' && safari.pushNotification ) );
				// Internet Explorer 6-11
				var isIE = /*@cc_on!@*/ false || !!document.documentMode;
				// Edge 20+
				var isEdge = !isIE && !!window.StyleMedia;
				// Chrome 1+
				var isChrome = !!window.chrome && !!window.chrome.webstore;
				// Blink engine detection
				var isBlink = ( isChrome || isOpera ) && !!window.CSS;
				//Check if browser is IE
				if ( isIE ) {
					// insert conditional IE code here
					return "INTERNET EXPLORER";
				}
				//Check if browser is Chrome
				else if (isChrome) {
					// insert conditional Chrome code here
					return "CHROME";
				}
				//Check if browser is Firefox 
				else if ( isFirefox ) {
					// insert conditional Firefox Code here
					return "FIREFOX";
				}
				//Check if browser is Safari
				else if (isSafari ) {
					// insert conditional Safari code here
					return "SAFARI";
				}
				//Check if browser is Opera
				else if ( isOpera ) {
					// insert conditional Opera code here
					return "OPERA";
				}
			}

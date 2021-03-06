<!--[if gte mso 9]>
<style>
ul {
  list-style-position: inside;
  margin: 0 0 0 24px;
  padding: 0;
}
</style>
<![endif]-->

<style type="text/css">
@font-face {
	font-family: 'montserratbold';
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.eot');
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.eot?#iefix') format('embedded-opentype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.woff2') format('woff2'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.woff') format('woff'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.ttf') format('truetype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-bold-webfont.svg#montserratbold') format('svg');
	font-weight: normal;
	font-style: normal;
	letter-spacing: 1px;
}

@font-face {
	font-family: 'montserratlight';
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.eot');
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.eot?#iefix') format('embedded-opentype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.woff2') format('woff2'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.woff') format('woff'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.ttf') format('truetype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-light-webfont.svg#montserratlight') format('svg');
	font-weight: normal;
	font-style: normal;
	letter-spacing: 1px;
}

@font-face {
	font-family: 'montserratsemi_bold';
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.eot');
	src: url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.eot?#iefix') format('embedded-opentype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.woff2') format('woff2'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.woff') format('woff'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.ttf') format('truetype'),
	url('https://s3.amazonaws.com/web.ucf.edu/email/common-assets/fonts/montserrat-semibold-webfont.svg#montserratsemi_bold') format('svg');
	font-weight: normal;
	font-style: normal;
	letter-spacing: 1px;
}


/* CSS Resets */
.ReadMsgBody {width: 100%; background-color: #ffffff;}
.ExternalClass {width: 100%; background-color: #ffffff;}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
body {margin:0; padding:0;}
table {border-spacing:0;border-collapse:collapse;}
table td {padding: 0;}

* {zoom:1;}
a {color:#006699;}
div, p, a, li, td {-webkit-text-size-adjust:none;} /* ios likes to enforce a minimum font size of 13px; kill it with this */


/**
* Outlook 2007-2013 hates inline webfont declarations and won't use fallback fonts,
* so use class-based overrides instead
**/
*[class="montserratlight"] {
	font-family: 'montserratlight', Helvetica, Arial, sans-serif !important;
}

*[class="montserratsemibold"] {
font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
}

*[class="montserratbold"] {
	font-family: 'montserratbold', Helvetica, Arial, sans-serif !important;
	font-weight: normal !important;
}

td[class="givebtn"] {
	font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
}

td[class="givedesc"] {
	font-family: 'montserratsemi_bold', Helvetica, Arial, sans-serif !important;
}

@media all and (min-width: 640px) {
	td[class="text-right-desktop"],
	th[class="text-right-desktop"] {
		text-align: right !important;
	}

	td[class="text-left-desktop"],
	th[class="text-left-desktop"] {
		text-align: left !important;
	}
}


@media all and (max-width: 640px) {
	table {
		border-collapse: separate !important;
	}

	/* The outermost wrapper table */
	table[class="wrapperOuter"] {
		margin: 10px 0 0 !important;
		width: 100% !important;
	}

	/* The firstmost inner tables, which should be padded at mobile sizes */
	table[class="wrapperInner"] {
		border-left: 0px solid transparent !important;
		border-right: 0px solid transparent !important;
		margin: 0 !important;
		padding-left: 15px;
		padding-right: 15px;
		width: 100% !important;
	}

	/* Generic class for a table column that should collapse to 100% width at mobile sizes */
	td[class="columnCollapse"],
	th[class="columnCollapse"] {
		border-left: 0px solid transparent !important;
		border-right: 0px solid transparent !important;
		clear: both;
		display: block !important;
		float: left;
		margin-left: 0 !important;
		margin-right: 0 !important;
		overflow: hidden;
		padding-left: 0 !important;
		padding-right: 0 !important;
		width: 100% !important;
	}

	/* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
	table[class="tableCollapse"] {
		border-left: 0px solid transparent !important;
		border-right: 0px solid transparent !important;
		margin-left: 0 !important;
		margin-right: 0 !important;
		padding-left: 0 !important;
		padding-right: 0 !important;
		width: 100% !important;
	}

	/* Forces an image to fit 100% width of its parent */
	img[class="responsiveimg"] {
		max-width: none !important;
		width: 100% !important;
	}

	*[class="hidemobile"] {
		display: none;
		font-size: 0;
		line-height: 0;
		max-height: 0;
		mso-hide: all; /* hide elements in Outlook 2007-2013 */
		overflow: hidden;
		width: 0;
	}

	*[class="showmobile"] {
		display: block !important;
		font-size: initial;
		line-height: initial;
		max-height: none !important;
		mso-hide: none !important;
		overflow: visible !important;
		width: auto !important;
	}

	td[class="givebtn"] {
		font-size: 16px !important;
		padding: 10px !important;
	}

	td[class="givedesc"] {
		font-size: 16px !important;
	}
}
</style>

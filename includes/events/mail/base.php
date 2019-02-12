<?php

# Which edition of the events should be displayed.
# Override if specified
if ( isset( $_GET['edition'] ) ) {
	if ( strtolower( $_GET['edition'] ) === 'weekday' ) {
		$edition = EVENTS_WEEKDAY_EDITION;
	} elseif ( strtolower($_GET['edition']) === 'weekend' ) {
		$edition = EVENTS_WEEKEND_EDITION;
	}
} else {
	$edition = get_events_edition();
}

if ( $edition === false ) {
	echo '<div style="width:500px;font-size:40px;margin:auto;text-align:center;">';
	echo 'There is no events edition due out today. Override by adding an `edition`';
	echo ' GET parameter to the URI with a value of either `weekday` or `weekend`.</div>';
	die();
}

switch ( $edition ) {
	case EVENTS_WEEKDAY_EDITION:
		extract( get_weekday_events() );
		break;
	case EVENTS_WEEKEND_EDITION:
		extract( get_weekend_events() );
		break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="initial-scale=1.0"><!-- So that mobile webkit will display zoomed in -->
		<title>This Week<?php echo ( $edition === EVENTS_WEEKEND_EDITION ? 'end' : '' ); ?> at UCF</title>
		<style type="text/css">
			<!--
			html, body { margin:0; padding:0; background-color:#FFF; color:#333; font-family:Helvetica, sans-serif; }
			-->
			/* CSS Resets */
			.ReadMsgBody { width: 100%; background-color: #ffffff;}
			.ExternalClass {width: 100%; background-color: #ffffff;}
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
			body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
			body {margin:0; padding:0;}
			table {border-spacing:0;}
			table td {border-collapse:collapse;}
			ul {padding-left:25px;}
			li {padding-bottom:10px;}
			.yshortcuts a {border-bottom: none !important;}

			* {zoom:1;}
			a {color:#333;text-decoration:none;}
			div, p, a, li, td { -webkit-text-size-adjust:none; } /* ios likes to enforce a minimum font size of 13px; kill it with this */

			@media all and (max-width: 640px) {
				/* The outermost wrapper table */
				table[class="t600o"] {
					width: 100% !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					padding-left: 15px;
					padding-right: 15px;
				}
				/* The firstmost inner tables, which should be padded at mobile sizes */
				table[class="t600"] {
					width: 100% !important;
					padding-left: 0;
					padding-right: 0;
					padding-top: 15px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
					margin: 0 !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with bottom padding) */
				td[class="ccollapse100pb"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with light bottom padding) */
				td[class="ccollapse100pbs"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 5px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with top padding) */
				td[class="ccollapse100pt"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse at mobile sizes (with side, top padding). Use when no parent table with side padding exists. */
				td[class="ccollapseautopt"] {
					display: block !important;
					overflow: hidden;
					width: auto !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes (with top, bottom padding) */
				td[class="ccollapse100p"] {
					display: block !important;
					overflow: hidden;
					width: 100% !important;
					float: left;
					clear: both;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-top: 20px !important;
					padding-bottom: 20px !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table column that should collapse to 100% width at mobile sizes */
				td[class="ccollapse100"] {
					display: block !important;
					overflow: hidden;
					clear: both;
					width: 100% !important;
					float: left !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
				table[class="tcollapse100"] {
					width: 100% !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					border-left: 0px solid transparent !important;
					border-right: 0px solid transparent !important;
				}
				/* Forces an image to fit 100% width of its parent */
				img[class="responsiveimg"] {
					width: 100% !important;
				}

				/* Specific ID overrides */
				td[id="preferred-name"] {
					font-size: 16px !important;
				}
				td[id="week-at-ucf-wrap"] {
					padding-top: 5px !important;
				}
				td[id="week-at-ucf"] {
					font-size: 28px !important;
				}
				td[id="week-at-ucf-date"] {
					font-size: 21px !important;
					text-align: left !important;
					padding-bottom: 10px;
				}

				/* Weather overrides */
				br[class="linebreak"] {
					display: none !important;
				}
				table[id="weather"] {
					padding-top: 0 !important;
				}
				table[class="weather-col"] {
					width: 100% !important;
				}
				td[class="weather-icon-date"] {
					width: 40% !important;
					display: table;
					float: left;
				}
				span[class="weather-date"] {
					width: 85px;
					display: table-cell;
					text-align: center;
					vertical-align: middle;
				}
				img[class="weather-icon"],
				span[class="weather-icon"] {
					width: 30px !important;
					height: 30px !important;
					display: table-cell;
					vertical-align: middle;
					padding-left: 5px;
				}
				td[class="weather-temps"] {
					display: table;
					float: left;
					width: 60% !important;
				}
				span[class="temp"] {
					display: table-cell;
					height: 30px;
					width: 40px;
					vertical-align: middle;
					padding-left: 20px;
				}
				span[class="highlow"] {
					display: table-cell;
					height: 30px;
					vertical-align: middle;
				}

				/* Events overrides */
				span[class="event-date"] {
					font-size: 16px !important;
					font-weight: bold !important;
					padding-right: 0 !important;
				}
				a[class="view-day-events"] {
					font-size: 11px !important;
				}
				span[class="time-group-header"] {
					display: block;
					width: 100%;
					padding-bottom: 10px;
					font-size: 13px !important;
					font-weight: bold !important;
				}
				span[class="fallback-event-msg"] {
					font-size: 13px !important;
				}
				span[class="time"] {
					font-size: 12px !important;
				}
				div[class="event"] {
					margin-top: 3px;
					margin-bottom: 7px !important;
				}
				a[class="event-link"] {
					font-size: 13px !important;
				}

				/* More Events overrides */
				span[id="more-events"] {
					font-size: 18px !important;
				}

				table[id="footer"] {
					padding-top: 30px !important;
				}
			}
		</style>
	</head>
	<body bgcolor="#FFF">
		<table class="t600o" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;">
			<tr>
				<td class="ccollapseautopt" id="preferred-name" style="padding-top:30px;font-size:25px;font-weight:200;">
					!@!Preferred Name!@!, check out:
				</td>
			</tr>
			<tr>
				<td id="week-at-ucf-wrap" style="padding-top:30px;border-bottom:1px solid #dddddd;">
					<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
						<tr>
							<td class="ccollapse100" id="week-at-ucf" style="width:365px;font-size:36px;font-weight:200;">
								This Week<?php echo ( $edition === EVENTS_WEEKEND_EDITION ? 'end' : '' ); ?> @ <span style="color:#ffc907;font-weight:bold">UCF</span>
							</td>
							<td class="ccollapse100" id="week-at-ucf-date" style="width:235px;font-size:36px;font-weight:200;text-align:right;">
								<?php echo date( 'n/j', $start_date->getTimestamp() ) . '-' . date( 'n/j', $end_date->getTimestamp() ); ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?
			// Use includes here instead of get_template_part
			// to preserve scope.
			switch ( $edition ) {
				case EVENTS_WEEKDAY_EDITION:
					include( 'weekday-weather.php' );
					include( 'weekday-events.php' );
					break;
				case EVENTS_WEEKEND_EDITION:
					include( 'weekend-weather.php' );
					include( 'weekend-events.php' );
					break;
			}
			?>
			<tr>
				<td style="padding-top:30px;border-top:1px solid #dddddd;text-align:center;">
					<span id="more-events" style="font-size:23px;font-weight:200;">
						To see all upcoming events visit <a style="color:#a42929;text-decoration:none;border:none;" href="https://events.ucf.edu/upcoming/">https://events.ucf.edu</a>
					</span>
					<br /><br />
					<a style="font-size:14px;color:#a42929;text-decoration:none;border:none;" href="https://events.ucf.edu/manager/">Submit an event to the UCF Events Calendar</a>
				</td>
			</tr>
			<tr>
				<td style="padding-top:30px;">
					<table id="footer" class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;padding-top:15px;border-top:1px solid #ddd;padding-bottom:15px;">
						<tr>
							<td class="ccollapse100pb" style="width:330px;vertical-align:top;">
								<a href="https://www.ucf.edu">
									<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/logo-no-opportunity.png" style="border:0"/>
								</a>
								<p style="line-height:1.4em;font-size:15px;margin:0;padding:0;">
									4000 Central Florida Blvd.
									<br />
									Orlando, FL 32816
									<br />
									407 823 2000
								</p>
							</td>
							<td class="ccollapse100" style="width:145px;padding-left:40px;padding-top:20px;vertical-align:top;">
								<table border="0" align="left" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="margin:0; background-color:#FFF;">
									<tr>
										<td colspan="3" style="font-size:22px;font-weight:100;padding-bottom:3px;">
											Get Social:
										</td>
									</tr>
									<tr>
										<td>
											<a href="https://www.facebook.com/ucf/" style="text-decoration:none;">
												<img style="border:0;" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/facebook.png" />
											</a>
										</td>
										<td style="padding-left:10px;">
											<a href="https://www.twitter.com/UCF/" style="text-decoration:none;">
												<img style="border:0;" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/twitter.png" />
											</a>
										</td>
										<td style="padding-left:10px;">
											<a href="https://www.instagram.com/ucf.edu" style="text-decoration:none;">
												<img style="border:0;" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/instagram.png" />
											</a>
										</td>
										<td style="padding-left:10px;">
											<a href="https://www.youtube.com/user/UCF/" style="text-decoration:none;">
												<img style="border:0;" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/youtube.png" />
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-top:15px;padding-bottom:15px;text-align:center;font-size:13px;">
					Having trouble viewing this email? See it in your
					<?
					// Use includes here instead of get_template_part
					// to preserve scope.
					switch ( $edition ) {
						case EVENTS_WEEKDAY_EDITION:
							echo '<a style="color:blue;text-decoration:underline;" href="https://gmucf.smca.ucf.edu/events/weekday/">browser</a>.';
							break;
						case EVENTS_WEEKEND_EDITION:
							echo '<a style="color:blue;text-decoration:underline;" href="https://gmucf.smca.ucf.edu/events/weekend/">browser</a>.';
							break;
					}
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-top:15px;padding-bottom:15px;text-align:center;font-size:13px;">
					!@!UNSUBSCRIBE!@! from this email.
				</td>
			</tr>
		</table>
	</body>
</html>

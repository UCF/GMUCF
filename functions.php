<?php

# Set theme constants
#define('DEBUG', True);                  # Always on
#define('DEBUG', False);                 # Always off
define('DEBUG', isset($_GET['debug'])); # Enable via get parameter
define('THEME_URL', get_bloginfo('stylesheet_directory'));
define('THEME_DIR', get_stylesheet_directory());
define('THEME_INCLUDES_DIR', THEME_DIR.'/includes');
define('THEME_STATIC_URL', THEME_URL.'/static');
define('THEME_IMG_URL', THEME_STATIC_URL.'/img');
define('THEME_JS_URL', THEME_STATIC_URL.'/js');
define('THEME_CSS_URL', THEME_STATIC_URL.'/css');
define('THEME_OPTIONS_GROUP', 'settings');
define('THEME_OPTIONS_NAME', 'theme');
define('THEME_OPTIONS_PAGE_TITLE', 'Theme Options');

$theme_options = get_option(THEME_OPTIONS_NAME);
define('GA_ACCOUNT', $theme_options['ga_account']);
define('CB_UID', $theme_options['cb_uid']);
define('CB_DOMAIN', $theme_options['cb_domain']);

define('EVENTS_URL', 'http://events.ucf.edu');
define('EVENTS_CALENDAR_ID', 1);
define('EVENTS_FETCH_TIMEOUT', 3); // seconds
define('EVENTS_CACHE_DURATION', 60 * 10); // seconds

define('FEATURED_STORIES_RSS_URL', 'http://today.ucf.edu/tag/main-site-stories/feed/');
define('FEATURED_STORIES_MORE_URL', 'http://today.ucf.edu/');

define('ANNOUNCEMENTS_RSS_URL', 'http://www.ucf.edu/feeds/announcement/');

define('WEATHER_URL', 'http://www.weather.com/weather/today/Orlando+FL+32816');
define('WEATHER_CACHE_DURATION', 60 * 30); // weather

require_once('functions-base.php');     # Base theme functions
require_once('custom-post-types.php');  # Where per theme post types are defined
require_once('shortcodes.php');         # Per theme shortcodes
require_once('functions-admin.php');    # Admin/login functions


/**
 * Set config values including meta tags, registered custom post types, styles,
 * scripts, and any other statically defined assets that belong in the Config
 * object.
 **/
Config::$custom_post_types = array(
	'Alert',
);

Config::$body_classes = array('default',);

/**
 * Configure theme settings, see abstract class Field's descendants for
 * available fields. -- functions-base.php
 **/
Config::$theme_settings = array(
	'Webmaster Tools' => array(
		new TextField(array(
			'name'        => 'Google WebMaster Verification',
			'id'          => THEME_OPTIONS_NAME.'[gw_verify]',
			'description' => 'Example: <em>9Wsa3fspoaoRE8zx8COo48-GCMdi5Kd-1qFpQTTXSIw</em>',
			'default'     => null,
			'value'       => $theme_options['gw_verify'],
		)),
		new TextField(array(
			'name'        => 'Yahoo! Site Explorer',
			'id'          => THEME_OPTIONS_NAME.'[yw_verify]',
			'description' => 'Example: <em>3236dee82aabe064</em>',
			'default'     => null,
			'value'       => $theme_options['yw_verify'],
		)),
		new TextField(array(
			'name'        => 'Bing Webmaster Center',
			'id'          => THEME_OPTIONS_NAME.'[bw_verify]',
			'description' => 'Example: <em>12C1203B5086AECE94EB3A3D9830B2E</em>',
			'default'     => null,
			'value'       => $theme_options['bw_verify'],
		)),
	),
	'Analytics' => array(
		new TextField(array(
			'name'        => 'Google Analytics Account',
			'id'          => THEME_OPTIONS_NAME.'[ga_account]',
			'description' => 'Example: <em>UA-9876543-21</em>. Leave blank for development.',
			'default'     => null,
			'value'       => $theme_options['ga_account'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat UID',
			'id'          => THEME_OPTIONS_NAME.'[cb_uid]',
			'description' => 'Example: <em>1842</em>',
			'default'     => null,
			'value'       => $theme_options['cb_uid'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat Domain',
			'id'          => THEME_OPTIONS_NAME.'[cb_domain]',
			'description' => 'Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['cb_domain'],
		)),
	),
	'Facebook' => array(
		new RadioField(array(
			'name'        => 'Enable OpenGraph',
			'id'          => THEME_OPTIONS_NAME.'[enable_og]',
			'description' => 'Turn on the opengraph meta information used by Facebook.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_og'],
	    )),
		new TextField(array(
			'name'        => 'Facebook Admins',
			'id'          => THEME_OPTIONS_NAME.'[fb_admins]',
			'description' => 'Comma seperated facebook usernames or user ids of those responsible for administrating any facebook pages created from pages on this site. Example: <em>592952074, abe.lincoln</em>',
			'default'     => null,
			'value'       => $theme_options['fb_admins'],
		)),
	),
	'Search' => array(
		new RadioField(array(
			'name'        => 'Enable Google Search',
			'id'          => THEME_OPTIONS_NAME.'[enable_google]',
			'description' => 'Enable to use the google search appliance to power the search functionality.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_google'],
	    )),
		new TextField(array(
			'name'        => 'Search Domain',
			'id'          => THEME_OPTIONS_NAME.'[search_domain]',
			'description' => 'Domain to use for the built-in google search.  Useful for development or if the site needs to search a domain other than the one it occupies. Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['search_domain'],
		)),
		new TextField(array(
			'name'        => 'Search Results Per Page',
			'id'          => THEME_OPTIONS_NAME.'[search_per_page]',
			'description' => 'Number of search results to show per page of results',
			'default'     => 10,
			'value'       => $theme_options['search_per_page'],
		)),
	)
);

Config::$links = array(
	array('rel' => 'shortcut icon', 'href' => THEME_IMG_URL.'/favicon.ico',),
	array('rel' => 'alternate', 'type' => 'application/rss+xml', 'href' => get_bloginfo('rss_url'),),
);

Config::$styles = array(
	array('admin' => True, 'src' => THEME_CSS_URL.'/admin.css',),
	'http://universityheader.ucf.edu/bar/css/bar.css',
	THEME_CSS_URL.'/jquery.css',
	THEME_CSS_URL.'/yahoo.css',
	THEME_CSS_URL.'/blueprint-screen.css',
	array('media' => 'print', 'src' => THEME_CSS_URL.'/blueprint-print.css',),
	THEME_CSS_URL.'/webcom-base.css',
	get_bloginfo('stylesheet_url'),
);

Config::$scripts = array(
	array('admin' => True, 'src' => THEME_JS_URL.'/admin.js',),
	'http://universityheader.ucf.edu/bar/js/university-header.js',
	array('name' => 'jquery', 'src' => 'http://code.jquery.com/jquery-1.6.1.min.js',),
	THEME_JS_URL.'/jquery-extras.js',
	array('name' => 'base-script',  'src' => THEME_JS_URL.'/webcom-base.js',),
	array('name' => 'theme-script', 'src' => THEME_JS_URL.'/script.js',),
);

Config::$metas = array(
	array('charset' => 'utf-8',),
);
if ($theme_options['gw_verify']){
	Config::$metas[] = array(
		'name'    => 'google-site-verification',
		'content' => htmlentities($theme_options['gw_verify']),
	);
}
if ($theme_options['yw_verify']){
	Config::$metas[] = array(
		'name'    => 'y_key',
		'content' => htmlentities($theme_options['yw_verify']),
	);
}
if ($theme_options['bw_verify']){
	Config::$metas[] = array(
		'name'    => 'msvalidate.01',
		'content' => htmlentities($theme_options['bw_verify']),
	);
}


/* Custom Theme Functions */

/**
 * Fetch events from UCF event system (with caching)
 *
 * @return array
 * @author Chris Conover
 **/
function get_event_data($options = array())
{
	$cache_key_prefix = 'events-';
	$default_options = array(
		'limit'       => 5,
		'calendar_id' => EVENTS_CALENDAR_ID,
		'format'      => 'json');
	
	$options = array_merge($default_options, $options);
	
	$cache_key = $cache_key_prefix.implode('', $options);

	if( False) {
		return $events;
	} else {
		$events = array();
		$context = stream_context_create(
				array(
					'http' => array(
							'method'  => 'GET',
							'timeout' => EVENTS_FETCH_TIMEOUT
						)
				)
			);
		
		if( ($raw_events = @file_get_contents(EVENTS_URL.'?'.http_build_query($options), false, $context)) !== FALSE ) {
			if( !is_null($json_events = json_decode($raw_events)) ) {
				$events = $json_events;
			}
		}

		if(isset($options['limit']) && count($events) > $options['limit']) {
			$events = array_slice($events, 0, $options['limit']);
		}
		set_transient($cache_key, $events, EVENTS_CACHE_DURATION);
		return $events;
	}
}

/**
 * Wraps get_event_data and returns today's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_todays_events($options = array()) {
	$date = getdate();
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}

/**
 * Wraps get_event_data and returns tomorrow's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_tomorrows_events($options = array()) {
	$tomorrow = date_add((new DateTime()), new DateInterval('P0Y1DT0H0M'));
	$date = getdate($tomorrow->getTimestamp());
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}

/**
 * Fetches weather.com image ID and temp for today and tonight
 *
 * @return array
 * @author Chris Conover
 **/
function get_weather() {
	
	$cache_key = 'weather';

	// Default weather
	$weather = array(
		'today' => array(
				'image' =>30,
				'temp'  =>75
		),
		'tonight'=> array(
			'image' =>30,
			'temp'  =>65
		)
	);
	
	if( ($weather = get_transient($cache_key)) === False) {
		if( ($html = @file_get_contents(WEATHER_URL)) !== False) {
			$start_point = '<table class="twc-forecast-table twc-second">';
			$start_point_index = stripos($html,$start_point);
			$length = stripos($html, '</table>', $start_point_index) - ($start_point_index + strlen($start_point));

			$forecast_table = substr($html, $start_point_index + strlen($start_point), $length);

			// Today
			//// Image ID
			$match = preg_match('/http:\/\/s.imwx.com\/v.20100719.135915\/img\/wxicon\/130\/(\d+).png/', $forecast_table, $matches);

			if($match == 1) {
				$weather['today']['image'] = $matches[1];
			}
			//// Temp
			$match = preg_match('/<td class="twc-col-1 twc-forecast-temperature">(.*)<\/td>/', $forecast_table, $matches);
			if($match == 1) {
				$deg_part = $matches[0];
				$match = preg_match('/(\d+)&deg;/', $deg_part, $matches);
				if($match == 1) {
					$weather['today']['temp'] = $matches[1];
				}
			}

			// Check to see if the next column in Today or Tonight
			$match = preg_match('/<td class="twc-col-2 twc-forecast-when">(.*)<\/td>/', $forecast_table, $matches);
			if($match == 1) {
				$column = 3;
				if($matches[1] == 'Tonight') {
					$column = 2;
				}
				// Tonight
				///// Image ID
				$match = preg_match('/<td class="twc-col-'.$column.' twc-forecast-icon">(.*)<\/td>/', $forecast_table, $matches);
				if($match == 1) {
					$img_part = $matches[0];
					$match = preg_match('/\/(\d+)\.png/', $img_part, $matches);
					if($match == 1) {
						$weather['tonight']['image'] = $matches[1];
					}
				}
				//// Temp
				$match = preg_match('/<td class="twc-col-'.$column.' twc-forecast-temperature">(.*)<\/td>/', $forecast_table, $matches);
				if($match == 1) {
					$deg_part = $matches[0];
					$match = preg_match('/(\d+)&deg;/', $deg_part, $matches);
					if($match == 1) {
						$weather['tonight']['temp'] = $matches[1];
					}
				}
			}
		}

		set_transient($cache_key, $weather, WEATHER_CACHE_DURATION);
	}
	return $weather;
}

?>

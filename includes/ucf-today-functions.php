<?php
/**
 * Functions related to retrieval of curated news
 * articles or fallback content from UCF Today
 */
namespace GMUCF\Theme\Includes\UCFToday;
use GMUCF\Theme\Includes\Utilities;


/**
 * Retrieves "backup" featured stories for the
 * News & Announcements email.
 *
 * Intended for use only when a curated list of stories from UCF Today
 * (via the GMUCF Email Options feed) is unavailable.
 *
 * @since 0.1.0
 * @author Chris Conover
 * @param int $limit Number of stories to retrieve
 * @return array
 */
function get_featured_stories_details( $limit=2 ) {
	$stories = array();
	$main_site_stories_rss_url = get_option( 'main_site_stories_url' );
	$main_site_stories_timeout = get_option( 'main_site_stories_timeout' );

	$rss = Utilities\custom_fetch_feed(
		$main_site_stories_rss_url . '?thumb=gmucf_featured_story',
		$main_site_stories_timeout
	);

	if ( ! is_wp_error( $rss ) ) {
		$rss_items = $rss->get_items( 0, $rss->get_item_quantity( 15 ) );

		$count = 0;
		foreach ( $rss_items as $rss_item ) {
			if ( $count === $limit ) break;

			$story = array(
				'image'       => '',
				'title'       => '',
				'description' => '',
				'permalink'   => ''
			);

			// NOTE: get_enclosure() doesn't always return the story
			// header image like you'd expect, and may result in the
			// fallback story image being shown as a result
			$enclosure = $rss_item->get_enclosure();
			if (
				$enclosure
				&& in_array( $enclosure->get_type(), Utilities\get_valid_enclosure_types() )
				&& ( $image = $enclosure->get_link() )
			) {
				$image = $enclosure->get_link();
				$story['image'] = Utilities\remove_quotes( $image );
			} else {
				$story['image'] = Utilities\remove_quotes( GMUCF_THEME_IMG_URL . '/no-photo.png' );
			}
			$story['title']       = Utilities\sanitize_for_email( $rss_item->get_title() );
			$story['description'] = Utilities\sanitize_for_email( $rss_item->get_description() );
			$story['permalink']   = Utilities\remove_quotes( $rss_item->get_permalink() );

			array_push( $stories, $story );
			$count++;
		}
	} else {
		$error_string = $rss->get_error_message();
		error_log( 'GMUCF - get_featured_stories_details() - ' . $error_string );
	}

	return $stories;
}


/**
 * Fetches GMUCF options page values from UCF Today
 *
 * @since 2.0.0
 * @author Cadie Brown
 * @return array $gmucf_email_options Data from the GMUCF Email Options feed
 */
function get_gmucf_email_options_feed_values() {
	$options_url         = get_option( 'gmucf_email_options_url' );
	$options_timeout     = get_option( 'gmucf_email_options_json_timeout' );
	$gmucf_email_options = array();

	$response = wp_remote_get(
		$options_url . '?' . time(),
		array( 'timeout' => $options_timeout )
	);

	if ( is_array( $response ) ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $items ) {
			$gmucf_email_options = $items;
		}
	} else {
		$error_string = $response->get_error_message();
		error_log( 'GMUCF - get_gmucf_email_options_feed_values() - ' . $error_string );
	}

	return $gmucf_email_options;
}

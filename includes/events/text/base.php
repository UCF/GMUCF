<?php

# Which edition of the events should be displayed.
# Override if specified
if ( isset( $_GET['edition'] ) ) {
	if ( strtolower( $_GET['edition'] ) === 'weekday' ) {
		$edition = EVENTS_WEEKDAY_EDITION;
	} elseif ( strtolower( $_GET['edition'] ) === 'weekend' ) {
		$edition = EVENTS_WEEKEND_EDITION;
	}
} else {
	$edition = get_events_edition();
}

if ( $edition === false ) {
	echo '<div style="width:500px;font-size:40px;margin:auto;text-align:center;">';
	echo 'There is no events edition due out today. Override by adding an `edition`';
	echo ' GET paramter to the URI with a value of either `weekday` or `weekend`.</div>';
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

$weather = get_weather( 'weather-extended' );
header( 'Content-type: text/plain' );
?>
This Week<?php echo ( $edition === EVENTS_WEEKEND_EDITION ? 'end' : '' ); ?> @ UCF

-- Weather

<?php
if ( ! empty( $weather ) ) {
	switch ( $edition ) {
		case EVENTS_WEEKDAY_EDITION:
			echo 'Today:     ' . $weather['day1']['tempMaxN'] . ' High, ' . $weather['day1']['tempMinN'] . ' Low' . "\n";
			echo 'Tomorrow:  ' . $weather['day2']['tempMaxN'] . ' High, ' . $weather['day2']['tempMinN'] . ' Low' . "\n";
			echo date( 'l', strtotime( $weather['day3']['date'] ) ) . ': ' . $weather['day3']['tempMaxN'] . ' High, ' . $weather['day3']['tempMinN'] . ' Low' . "\n";
			echo date( 'l', strtotime( $weather['day4']['date'] ) ) . ': ' . $weather['day4']['tempMaxN'] . ' High, ' . $weather['day4']['tempMinN'] . ' Low' . "\n";
			echo date( 'l', strtotime( $weather['day5']['date'] ) ) . ': ' . $weather['day5']['tempMaxN'] . ' High, ' . $weather['day5']['tempMinN'] . ' Low' . "\n";
			break;
		case EVENTS_WEEKEND_EDITION:
			echo 'Today:     ' . $weather['day1']['tempMaxN'] . ' High, ' . $weather['day1']['tempMinN'] . ' Low' . "\n";
			echo 'Tomorrow:  ' . $weather['day2']['tempMaxN'] . ' High, ' . $weather['day2']['tempMinN'] . ' Low' . "\n";
			echo date( 'l', strtotime( $weather['day3']['date'] ) ) . ': ' . $weather['day3']['tempMaxN'] . ' High, ' . $weather['day3']['tempMinN'] . ' Low' . "\n";
			echo date( 'l', strtotime( $weather['day4']['date'] ) ) . ': ' . $weather['day4']['tempMaxN'] . ' High, ' . $weather['day4']['tempMinN'] . ' Low' . "\n";
			break;
	}
}
?>

-- Events

<?php
for ( $i = 0; $i < count( $days ); $i++ ) {
	$day       = $days[$i];
	$title     = 'Today';

	switch ( $edition ) {
		case EVENTS_WEEKDAY_EDITION:
			$event_day = 'Monday';
			switch ( $i ) {
				case 1:
					$title     = 'Tomorrow';
					$event_day = 'Tuesday';
					break;
				case 2:
					$title = $event_day = 'Wednesday';
					break;
				case 3:
					$title = $event_day = 'Thursday';
					break;
				case 4:
					$title = $event_day = 'Friday';
					break;
			}
		break;
		case EVENTS_WEEKEND_EDITION:
			switch ( $i ) {
				case 1:
					$title     = 'Tomorrow';
					$event_day = 'Saturday';
					break;
				case 2:
					$title = $event_day = 'Sunday';
					break;
				case 3:
					$title = $event_day = 'Monday';
					break;
			}
		break;
	}

	# date_add modifies the passed object in place. want $start_date to stay the
	# same so make a copy of it.
	# http://www.php.net/manual/en/datetime.add.php#102193
	$_start_date          = new DateTime( date( 'c', $start_date->getTimestamp() ) );
	$title_date           = date_add( $_start_date, new DateInterval( 'P' . $i . 'D' ) );
	$title_date_timestamp = $title_date->getTimestamp();
	$all_events_link      = EVENTS_URL . date( 'Y', $title_date_timestamp ) . '/' . date( 'n', $title_date_timestamp ) . '/' . date( 'j', $title_date_timestamp );

	if ( $i > 0 ) {
		echo "\n\n\n";
	}
	echo '> ' . $title . "\n";
	echo '>> Morning' . "\n";

	if ( count( $day['morning'] ) === 0 ) {
			echo '   No Morning Events' . "\n";
	} else {
		foreach ( $day['morning'] as $section=>$events ) {
			echo '   - ' . ($section === '12:00 AM' ? 'All Day' : $section) . "\n";
			foreach ( $events as $event ) {
				echo '    ' . strip_tags( $event->title ) . ' - ' . ( $event->url ) . "\n";
			}
		}
	}

	echo '>> Afternoon' . "\n";

	if ( count( $day['afternoon'] ) === 0 ) {
			echo '   No Afternoon Events' . "\n";
	} else {
		foreach ( $day['afternoon'] as $section=>$events ) {
			echo '   - ' . ( $section === '12:00 AM' ? 'All Day' : $section ) . "\n";
			foreach ( $events as $event ) {
				echo '    ' . strip_tags( $event->title ) . ' - ' . ( $event->url ) . "\n";
			}
		}
	}

	echo '>> Evening' . "\n";

	if ( count( $day['evening'] ) === 0 ) {
			echo '   No Evening Events' . "\n";
	} else {
		foreach ( $day['evening'] as $section=>$events ) {
			echo '   - ' . ( $section === '12:00 AM' ? 'All Day' : $section ) . "\n";
			foreach ( $events as $event ) {
				echo '    ' . strip_tags( $event->title ) . ' - ' . ( $event->url ) . "\n";
			}
		}
	}
}
?>


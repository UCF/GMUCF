<?php
for ( $i = 0; $i < count( $days ); $i++ ) :
		$day       = $days[$i];
		$title     = 'Today';
		$event_day = 'Friday';
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
		# date_add modifies the passed object in place. want $start_date to stay the
		# same so make a copy of it.
		# http://www.php.net/manual/en/datetime.add.php#102193
		$_start_date          = new DateTime( date( 'c', $start_date->getTimestamp() ) );
		$title_date           = date_add( $_start_date, new DateInterval( 'P' . $i . 'D' ) );
		$title_date_timestamp = $title_date->getTimestamp();
		$all_events_link      = EVENTS_URL.date( 'Y', $title_date_timestamp ) . '/' . date( 'n',$title_date_timestamp ) . '/' . date( 'j', $title_date_timestamp ) . '/';
?>
<div class="day">
	<h2><?php echo $title; ?>, <?php echo date( 'n/j', $title_date_timestamp ); ?> <a href="<?php echo $all_events_link; ?>" style="font-size:15px;color:#9d1a1a;">View all <?php echo $event_day; ?> events</a></h2>
	<div class="morning">
		<h3>Morning</h3>
		<?php if ( count( $day['morning'] ) === 0 ) : ?>
			No Morning Events
		<?php else : ?>
			<?php foreach ( $day['morning'] as $section=>$events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
					<div style="margin-bottom:15px;color:blue;">
						<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
							<?php echo esc_html( $event->title ); ?>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="afternoon">
		<h3>Afternoon</h3>
		<?php if ( count( $day['afternoon'] ) === 0 ) : ?>
			No Afternoon Events
		<?php else : ?>
			<?php foreach ( $day['afternoon'] as $section=>$events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
					<div style="margin-bottom:15px;color:blue;">
						<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
							<?php echo esc_html( $event->title ); ?>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="evening">
		<h3>Evening</h3>
		<?php if ( count( $day['evening'] ) === 0 ) : ?>
		No Evening Events
		<?php else : ?>
			<?php foreach ( $day['evening'] as $section=>$events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'Ongoing' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
					<div style="margin-bottom:15px;color:blue;">
						<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
							<?php echo esc_html( $event->title ); ?>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div style="clear:left">&nbsp;</div>
</div>
<?php endfor; ?>

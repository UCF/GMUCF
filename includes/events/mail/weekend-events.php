<?php for ( $i = 0; $i < count( $days ); $i++ ) :
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
		$all_events_link      = EVENTS_URL . date( 'Y', $title_date_timestamp ) . '/' . date( 'n', $title_date_timestamp ) . '/' . date( 'j', $title_date_timestamp ) . '/';
?>
<tr>
	<td class="ccollapse100p" style="border-top:1px solid #ddd;padding-top:35px;padding-bottom:35px;">
		<span class="event-date" style="font-size:25px;font-weight:500;padding-right:15px;"><?php echo $title; ?>, <?php echo date( 'n/j', $title_date_timestamp ); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a class="view-day-events" href="<?php echo $all_events_link; ?>" style="font-size:15px;color:#9d1a1a;">View all <?php echo $event_day; ?> events</a>
		<br class="linebreak" /><br class="linebreak" />
		<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td class="ccollapse100pb" style="width:200px;border-right:1px solid #ddd;vertical-align:top;padding-right:15px;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">MORNING</span>
					<br class="linebreak" /><br class="linebreak" />
					<?php if ( count( $day['morning'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Morning Events</span>
					<?php else : ?>
						<?php foreach ( $day['morning'] as $section=>$events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
								<div class="event" style="margin-bottom:15px;color:blue;">
									<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?php echo esc_html( $event->title ); ?>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
				<td class="ccollapse100pb" style="width:200px;border-right:1px solid #ddd;padding-left:15px;vertical-align:top;padding-right:15px;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">AFTERNOON</span>
					<br class="linebreak" /><br class="linebreak" />
					<?php if ( count( $day['afternoon'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Afternoon Events</span>
					<?php else : ?>
						<?php foreach ( $day['afternoon'] as $section=>$events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'Ongoing' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
								<div class="event" style="margin-bottom:15px;color:blue;">
									<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?php echo esc_html( $event->title ); ?>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
				<td class="ccollapse100" style="width:200px;padding-left:15px;vertical-align:top;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">EVENING</span>
					<br class="linebreak"  /><br class="linebreak" />
					<?php if ( count( $day['evening'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Evening Events</span>
					<?php else : ?>
						<?php foreach ( $day['evening'] as $section=>$events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
								<div class="event" style="margin-bottom:15px;color:blue;">
									<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?php echo esc_html( $event->title ); ?>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
<?php endfor; ?>

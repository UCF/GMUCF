<?php
$weather = get_weather( 'weather-extended' );
if ( ! empty( $weather ) ) :
?>
<div id="weekend-weather" class="weather">
	<div class="day">
		<div class="day-image">
			<h2>Today</h2>
			<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day1']['imgCode']; ?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?php echo $weather['day1']['tempMaxN']; ?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?php echo $weather['day1']['tempMinN']; ?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2>Tomorrow</h2>
			<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day2']['imgCode']; ?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?php echo $weather['day2']['tempMaxN']; ?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?php echo $weather['day2']['tempMinN']; ?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2><?=date('l', strtotime($weather['day3']['date']))?></h2>
			<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day3']['imgCode']; ?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?php echo $weather['day3']['tempMaxN']; ?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?php echo $weather['day3']['tempMinN']; ?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div class="day">
		<div class="day-image">
			<h2><?=date('l', strtotime($weather['day4']['date']))?></h2>
			<img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day4']['imgCode']; ?>.png" />
		</div>
		<div class="temp">
			<div class="high">
				<strong><?php echo $weather['day4']['tempMaxN']; ?>&deg;</strong>
				<br />
				High
			</div>
			<div class="low">
				<strong><?php echo $weather['day4']['tempMinN']; ?>&deg;</strong>
				<br />
				Low
			</div>
		</div>
	</div>
	<div style="clear:left;">&nbsp;</div>
</div>
<?php endif; ?>

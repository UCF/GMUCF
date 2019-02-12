<?php
$weather = get_weather( 'weather-extended' ); 
if ( ! empty( $weather ) ) :
?>
<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<table class="t600" id="weather" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:auto; background-color:#FFF;">
			<tr>
				<td class="ccollapse100pbs" style="width:120px;border-right:1px solid #ddd;padding-right:15px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:90px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TODAY</span>
								<img class="weather-icon" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day1']['imgCode']; ?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day1']['tempMaxN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day1']['tempMinN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100pbs" style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:90px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TOMORROW</span>
								<img class="weather-icon" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day2']['imgCode']; ?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day2']['tempMaxN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day2']['tempMinN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100pbs" style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:90px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?php echo strtoupper( date( 'l', strtotime( $weather['day3']['date'] ) ) ); ?></span>
								<img class="weather-icon" src="<?php echo bloginfo('stylesheet_directory'); ?>/static/img/weather/<?php echo $weather['day3']['imgCode']; ?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day3']['tempMaxN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day3']['tempMinN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td class="ccollapse100" style="width:120px;padding-left:20px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:90px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?php echo strtoupper( date( 'l', strtotime( $weather['day4']['date'] ) ) ); ?></span>
								<img class="weather-icon" src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/weather/<?php echo $weather['day4']['imgCode']; ?>.png" />
							</td>
							<td class="weather-temps">
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day4']['tempMaxN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day4']['tempMinN']; ?>&deg;</span>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>
<?php endif; ?>
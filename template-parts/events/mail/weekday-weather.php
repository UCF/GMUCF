<?php
namespace GMUCF\Theme\TemplateParts\Events\Mail\WeekdayWeather;
use GMUCF\Theme\Includes\Weather;


$weather = Weather\get_weather('weather-extended');
if (!empty($weather)) {
?>
<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<table class="t600" id="weather" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TODAY</span>
								<img class="weather-icon" src="<?php echo Weather\get_weather_icon_classic( $weather['day1']['imgCode'] ); ?>" />
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
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;">TOMORROW</span>
								<img class="weather-icon" src="<?php echo Weather\get_weather_icon_classic( $weather['day2']['imgCode'] ); ?>" />
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
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?php echo strtoupper(date('l', strtotime($weather['day3']['date']))); ?></span>
								<img class="weather-icon" src="<?php echo Weather\get_weather_icon_classic( $weather['day3']['imgCode'] ); ?>" />
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
				<td class="ccollapse100pbs" style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?php echo strtoupper(date('l', strtotime($weather['day4']['date']))); ?></span>
								<img class="weather-icon" src="<?php echo Weather\get_weather_icon_classic( $weather['day4']['imgCode'] ); ?>" />
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
				<td class="ccollapse100" style="width:110px;padding-left:10px;">
					<table class="weather-col" width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td class="weather-icon-date" style="width:60px">
								<span class="weather-date" style="font-size:10px;font-weight:bold;"><?php echo strtoupper(date('l', strtotime($weather['day5']['date']))); ?></span>
								<?php if($weather['day5']['imgCode'] == '') {?>
									<br class="linebreak" />
									<span class="weather-icon" style="font-size:15px;font-weight:bold;">???</span>
								<?php } else { ?>
									<img class="weather-icon" src="<?php echo Weather\get_weather_icon_classic( $weather['day5']['imgCode'] ); ?>" />
								<?php } ?>
							</td>
							<td class="weather-temps">
								<?php if($weather['day5']['tempMaxN'] == '') {?>
									<span class="temp" style="font-size:18px;font-weight:bold">?</span>
								<?php } else { ?>
									<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day5']['tempMaxN']; ?>&deg;</span>
								<?php } ?>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">High</span>
								<br class="linebreak" />
								<?php if($weather['day5']['tempMinN'] == '') {?>
									<span class="temp" style="font-size:18px;font-weight:bold">?</span>
								<?php } else { ?>
									<span class="temp" style="font-size:18px;font-weight:bold"><?php echo $weather['day5']['tempMinN']; ?>&deg;</span>
								<?php } ?>
								<br class="linebreak" />
								<span class="highlow" style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>
<?php } ?>

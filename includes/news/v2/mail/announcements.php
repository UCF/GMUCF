<tr>
  <td class="montserratbold" style="padding-top: 20px; padding-bottom: 2px; padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: bold; color: #000; text-transform: uppercase;" align="left">
	<a style="text-decoration: none; color: #000;" href="https://www.ucf.edu/announcements/">Announcements</a>
	<div style="width: 35px; border-top: 3px solid #fc0; margin-top: 5px;"></div>
  </td>
</tr>

<tr>
	<td>
		<?php
		$announcements = get_announcement_details();

		if( count( $announcements ) == 0 ) { ?>
			<p>No announcements found for today.</p>
		<?php
		} else {
			?>
			<ul style="list-style: none; padding-left: 0;">
			<?php
			foreach( $announcements as $announcement ) :
				extract( $announcement );
			?>
				<li class="montserratlight" style="padding-top: 8px; padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif; color: #000;" align="left">
					<a href="<?php echo $permalink; ?>">
						<?php echo $title;?>
					</a>
				</li>
			<?php
			endforeach;
			?>
			</ul>
			<?php
		}
		?>
	</td>
</tr>

<tr>
	<td style="text-align: right;" align="right">
		<a href="<?php echo ANNOUNCEMENTS_MORE_URL; ?>">
			More Announcements
		</a>
	</td>
</tr>
<?php

if (is_login()){
	add_action('login_head', 'login_scripts', 0);
}

if (is_admin()){
	add_action('admin_menu', 'create_theme_options_page');
	add_action('admin_init', 'init_theme_options');
}

/**
 * Prints out additional login scripts, called by the login_head action
 *
 * @return void
 * @author Jared Lang
 **/
function login_scripts(){
	ob_start();?>
	<link rel="stylesheet" href="<?=THEME_CSS_URL?>/admin.css" type="text/css" media="screen" charset="utf-8" />
	<?php 
	$out = ob_get_clean();
	print $out;
}


/**
 * Called on admin init, initialize admin theme here.
 *
 * @return void
 * @author Jared Lang
 **/
function init_theme_options(){
	register_setting(THEME_OPTIONS_GROUP, THEME_OPTIONS_NAME, 'theme_options_sanitize');
}


/**
 * Registers the theme options page with wordpress' admin.
 *
 * @return void
 * @author Jared Lang
 **/
function create_theme_options_page() {
	add_utility_page(
		__(THEME_OPTIONS_PAGE_TITLE),
		__(THEME_OPTIONS_PAGE_TITLE),
		'edit_theme_options',
		'theme-options',
		'theme_options_page',
		THEME_IMG_URL.'/pegasus.png'
	);
}


/**
 * Outputs the theme options page html
 *
 * @return void
 * @author Jared Lang
 **/
function theme_options_page(){
	# Check for settings updated or updated, varies between wp versions
	$updated = (bool)($_GET['settings-updated'] or $_GET['updated']);
	?>
	
	<form method="post" action="options.php" id="theme-options">
		<div class="wrap">
			<h2><?=__(THEME_OPTIONS_PAGE_TITLE)?></h2>
			
			<?php if ($updated):?>
			<div class="updated fade"><p><strong><?=__( 'Options saved' ); ?></strong></p></div>
			<?php endif; ?>
			
			<?php settings_fields(THEME_OPTIONS_GROUP);?>
			<table class="form-table">
				<?php foreach(Config::$theme_settings as $key=>$setting):?>
				<?php if(is_array($setting)): $section = $setting;?>
				<tr class="section">
					<td colspan="2">
						<h3><?=$key?></h3>
						<table class="form-table">
							<?php foreach($section as $setting):?>
							<tr valign="top">
								<th scope="row"><?=$setting->label_html()?></th>
								<td class="field">
									<?=$setting->input_html()?>
									<?=$setting->description_html()?>
								</td>
							</tr>
							<?php endforeach;?>
						</table>
					</td>
				</tr>
				<?php else:?>
				<tr valign="top">
					<th scope="row"><?=$setting->label_html()?></th>
					<td class="field">
						<?=$setting->input_html()?>
						<?=$setting->description_html()?>
					</td>
				</tr>
				<?php endif;?>
				<?php endforeach;?>
			</table>
			<div class="submit">
				<input type="submit" class="button-primary" value="<?= __('Save Options')?>" />
			</div>
		</div>
	</form>
	
	<?php
}


/**
 * Stub, processing on theme options input
 *
 * @return void
 * @author Jared Lang
 **/
function theme_options_sanitize($input){
	return $input;
}
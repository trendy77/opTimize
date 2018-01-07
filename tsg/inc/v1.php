<?php
/**
 * Plugin Name: opTimise
 * Description: older functs
 * Author:      TF
 * Version:     3.0
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /
 */

add_action('init', 'removeHeadLinks');	
add_filter( 'post_limits', 'wpcodex_filter_main_search_post_limits', 15, 2 );
add_filter('the_content', 'wpse_ad_content');

add_action( 'plugins_loaded', 'oyfff_load_textdomain' );
add_action( 'rss2_ns', 'oyfff_add_webfeeds_namespace' );
add_action( 'rss2_head', 'oyfff_add_cover_icon' );
add_filter( 'the_content_feed', 'oyfff_add_featured_image' );
add_filter( 'the_excerpt_rss', 'oyfff_add_featured_image' );
add_action( 'rss2_head', 'oyfff_add_logo_accentcolor' );
add_action( 'rss2_head', 'oyfff_add_related' );
add_action( 'rss2_head', 'oyfff_add_google_analytics' );
add_action( 'admin_menu', 'oyfff_add_admin_menu' );
add_action( 'admin_init', 'oyfff_settings_init' );
add_action( 'admin_enqueue_scripts', 'oyfff_wp_admin_scripts' );



function getSiteDeets($whichDeets) {
	$blogid = get_current_blog_id();
	switch ($blogid){
		case '1':
			switch ($whichDeets){
				case '$path':		return '/home/trendyp4/public_html/tp';		break;
				case '$user':		return 'theCreator';						break;
				case '$pass':		return 'Joker999!';							break;
				case '$addy':		return 'trendypublishing.com';				break;
				case '$ua':		return 'UA-84079763-11';					break;
				case '$fbtit':return 'trendypublishing';				break;
				case '$fbpageid':return '1209167032497461';					break;
				case '$fbappid':return '867691370038214';		break;
				case '$hash':return 'TrendyPublishin';					break;
				case '$twitcnkey' : return ''; break;
				case '$twitcnsrt' : return ""; break;
				case '$twitkey': return ""; break;
				case '$twitscrt':return ""; break;
			}	
			case 'default':		// tpau
				switch ($whichDeets){
				case '$path':		return '/home/trendyp4/public_html/au';	break;
				case '$user':		return 'theCreator';			break;
				case '$pass':		return 't0mzdez2!Q';			break;
				case '$addy':		return 'trendypublishing.com.au';		break;
				case '$ua':			return 'UA-84079763-11';			break;
				case '$fbpageid':return '1209167032497461';					break;
				case '$fbappid':return '867691370038214';		break;
				case '$fbtit':return 'trendypublishing';
				case '$hash':return 'TrendyPublishin';					break;
				case '$twitcnkey' : return '2vOkc55DN1UbX6NJjJawC7UNM'; break;
				case '$twitcnsrt' : return "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V"; break;
				case '$twitkey': return "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq"; break;
				case '$twitscrt': return "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5";break;
			}	
		/// organiZe
			case '8':
			switch ($whichDeets){
				case '$path':			return '/home/trendyp4/public_html';			break;
				case '$user':			return 'headlines';			break;
				case '$pass':			return 'ExtJCJn%jRMzl1(5L5W*JBP#';			break;
				case '$fbtit': 			return 'organizemybiz';break;
				case '$addy':			return 'organizemybiz.com';			break;
				case '$ua':				return 'UA-84079763-6';			break;
				case '$fbappId' : 		return '1209167032497461'; break;
				case '$fbpageId' : 		return '259565577769881'; break;
				case '$twitcnkey':		return 'wTU8Ntmn3q5nN7OrwdXfBn7Xx';break;
				case '$twitcnsrt':		return 'fqlbIEnIHY4fEBmVoPnqIV7j5JN6doDuh4QLEVLjGmLb59jg9N';break;
				case '$twitkey': 		return '754663243465891840-FFZjZRlOT84GY0YTvoKugAkMcwW7YeT';break; //access token
				case '$twitscrt':		return '8mQiNYUIMGiCTqifFEiMJBIIrJkPLvd5ZybFFUdas1hhZ';break;
				}
				
			case 'orgbiz':
			switch ($whichDeets){
				case '$path':			return '/home/trendyp4/public_html';			break;
				case '$user':			return 'headlines';			break;
				case '$pass':			return 'ExtJCJn%jRMzl1(5L5W*JBP#';			break;
				case '$fbtit': return 'organisemybiz';break;
				case '$addy':			return 'organisemybiz.com';			break;
				case '$ua':			return 'UA-84079763-6';			break;
				case '$fbappId' : return '1209167032497461'; break;
				case '$fbpageId' : return '259565577769881'; break;
				case '$twitcnkey' : return '2vOkc55DN1UbX6NJjJawC7UNM'; break;
				case '$twitcnsrt' : return "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V"; break;
				case '$twitkey' : return "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq"; break;
				case '$twitscrt' : return "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5";break;
				}
				
				//vape
				case '11':
				switch ($whichDeets){
				case '$path':			return '/home/trendyp4/public_html';		break;
				case '$user':			return 'trendyvape';			break;
				case '$pass':			return 't0mzdez2!';			break;
				case '$addy':			return 'vapedirectory.co';			break;
				case '$ua':			return 'UA-84079763-9';			break;		
				case '$hash':		return 'VapeDirectoryCo';break;
				case '$fbappid':   return '1829696163961982';break;
				case '$fbtit': return 'vapedirectoryco';break;
				}
				
				// globetravel
				case '10':
				switch ($whichDeets){
				case '$path':			return '/home/trendyp4/public_html';			break;
				case '$user':			return 'trendyTravel';			break;
				case '$pass':			return 't0mzdez2!t0mzdez2!';			break;
				case '$addy':			return 'globetravelsearch.co';			break;
				case '$fbtit': return 'globetravelsearch';break;
				case '$hash': 	return 'GlobeTravelSrch'; break;
				case '$ua':			return 'UA-84079763-13';	break;
				case '$fbscrt': return '598188680454c7e4fe3ace0d5267ed1d'; break;
				case '$fbcltk': return '6013598acf467d04ee5115b4a27421de'; break;
				case '$fbappid':	return '1234986849903672'; break;
				case '$fbpageid':	return '232122247192377';			break;
				case '$twitcnkey' : return 'uQvDVa4L687Bc4ushiKPS11m7'; break;
				case '$twitcnsrt' : return "4mmOskv7nGhWFSVRh5QI4rQjRMvGZCJO2apwPJlGNWTVJ3RrQm"; break;
				case '$twitkey' : return "848746022876598272-KvrowCYanCMFI7832EgyhyJYIlvtR03"; break;
				case '$twitscrt' : return "1eF9ZjfHYj7YPf0qfykJGsXPKYuBwyltJCmbbGnfgqn4N";break;
					}			
		
					// gov
					case '6':
				switch ($whichDeets){
					case '$path':	return '/home/trendyp4/public_html/govnews';		break;
					case '$user':			return 'govfeed'; break;
					case '$pass':			return '0Q!L!Y34G^$kO8tQuS@INZg0';			break;
					case '$addy':			return 'govnews.info';			break;
					case '$ua':			return 'UA-84079763-8';			break;
					case '$fbappid':		return '392413184462764';			break;
					case '$fbscrt':		return '06e7300c47ae4a4d1db42f87d0b2e186';			break;
					case '$fbtit': return 'govnewsinfo';break;
					case '$fbpageid':		return '1645038759139286';			break;
				}
		// fnr
			case '5':
				switch ($whichDeets){
					case '$path' :  '/home5/organli6/public_html';break;
					case '$user' : 'theCreator';break;
					case '$pass' : 'Joker999!';break;
					case '$addy' : 'fakenewsregistry.org';break;
					case '$fbappid' : '1883167178608105';break;
					case '$fbpageId' : '1209167032497461';break;
					case '$fbscrt' : "5492eaef66ec612e1c443285d223a2e6";break;
					case '$fbtit' : return"newssansfact";break;
					case '$twitcnkey' : "2vOkc55DN1UbX6NJjJawC7UNM";break;
					case '$twitcnsrt' : "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V";break;
					case '$twitkey' : "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq";break;
					case '$twitscrt' : "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5";break;
					case '$ua' : 'UA-84079763-6';break;
				}

				// ckww
			case '4':
				switch ($whichDeets){
			case '$path':		return '/public_html';		break;
			case '$user':		return 'customkits';						break;
			case '$pass':		return 't0mzdez2!';							break;
			case '$addy':		return 'customkitsworldwide.com';				break;
			case '$ua':		return 'UA-85225777-1';					break;
				//	case '$gtm':	return '';									break;
			//case '$fbpageid':return '';			break;
			//	case '$fbappid':return '';						break;
			//case '$fbscrt':return '';break;
			//case '$hash':return '@';	break;
			// case '$twitcnkey': return;break;
			// case '$twitcnsrt': return;break;
			// case '$twitkey': return;break;
			// case '$twitscrt': return ;break;
			// case '$hash':return '';	break;
		}	
	}	
}


 //** enable to add affilate links 2 keywords **//
	add_filter('the_content', 'replace_text_wps');
	add_filter('the_excerpt', 'replace_text_wps');
function replace_text_wps($text){
	$replace = array(
		'nike'   =>  '<a href="http://redirect.viglink.com?key=db8e8b461e1b6dcc640b00494a7a95e9&u=http%3A%2F%2Fnike.com">Nike</a>',
		'adidas' =>  '<a href="http://redirect.viglink.com?key=db8e8b461e1b6dcc640b00494a7a95e9&u=http%3A%2F%2Fadidas.com">Adidas</a>',
		'puma' =>  '<a href="http://redirect.viglink.com?key=db8e8b461e1b6dcc640b00494a7a95e9&u=http%3A%2F%2Fpuma.com">Puma</a>',
		);
	}
	

		function wpse_ad_content($content){
			if (!is_single()) return $content;
			$paragraphAfter = 2; //Enter number of paragraphs to display ad after.
			$paragraph4After = 8;
		   $content = explode("</p>", $content);
			$new_content = '';
			for ($i = 0; $i < count($content); $i++) {
				if ($i == $paragraphAfter) {
					$new_content.= '<div id="t_advert2">';
					$new_content.= '<ins class="adsbygoogle" style="display:inline-block;width:320px;height:100px" data-ad-client="ca-pub-4943462589133750" data-ad-slot="5993932022"></ins>';
					$new_content.= '</div>';
				} 
				if ($i == $paragraph4After){
					$new_content.= '<div id="t_advert">';
					$new_content.= '<ins class="adsbygoogle" style="display:inline-block;width:336px;height:280px data-ad-client="ca-pub-4943462589133750" data-ad-slot="1808495228"></ins>';
					$new_content.= '</div>';
				} 
				$new_content.= $content[$i] . "</p>";
			}
		return $new_content;
		}

	

		function removeHeadLinks(){
		 // publicize your main RSS feed and remove the other feeds
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		add_filter( 'pre_comment_content', 'esc_html' );
		add_filter('show_admin_bar', '__return_false');
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		add_filter( 'auth_cookie_expiration', 'stay_logged_in_for_1_year' );
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		}
		function stay_logged_in_for_1_year( $expire ) {
			return 31556926; // 1 year in seconds
		  }
  
		function oyfff_load_textdomain() {
			load_theme_textdomain( 'oyfff', false, get_template_directory() . '/languages' );
		}
		function oyfff_add_webfeeds_namespace() {
			echo 'xmlns:webfeeds="http://webfeeds.org/rss/1.0"';
		}
		function oyfff_add_cover_icon() {
			$options = get_option( 'oyfff_settings' );
			if ( $options['oyfff_cover'] ) {
				echo sprintf(
					'<webfeeds:cover image="%s" />',
					esc_url( $options['oyfff_cover'] )
				);
			}
			else { 
			echo sprintf( '<webfeeds:cover image="%s" />', esc_url( 'trendypublishing.com/timg/wide.jpg' )
				);
			}
		if ( $options['oyfff_icon'] ) {
			echo sprintf(
					'<webfeeds:icon>%s</webfeeds:icon>',
					esc_url( $options['oyfff_icon'] )
				);
			} 
			else {
			echo sprintf('<webfeeds:icon>%s</webfeeds:icon>', esc_url( 'trendypublishing.com/favicon.ico' )  );
			}
		}
		function oyfff_add_featured_image( $content ) {
		global $post;
			$options = get_option( 'oyfff_settings' );
			if ( $options['oyfff_featured_image'] ) {
				if ( has_post_thumbnail( $post->ID ) ) {
					$post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					$post_thumbnail = "<figure><img src='$post_thumbnail_url' class='webfeedsFeaturedVisual'></figure>";
					$content = $post_thumbnail . $content;
				}
			}
			return $content;
		}
		function oyfff_add_logo_accentcolor() {
			$options = get_option( 'oyfff_settings' );
			if ( $options['oyfff_logo'] ) {
				echo sprintf(
					'<webfeeds:logo>%s</webfeeds:logo>',
					esc_url( $options['oyfff_logo'] )
				);
			}
			if ( $options['oyfff_accentcolor'] ) {
				echo sprintf(
					'<webfeeds:accentColor>%s</webfeeds:accentColor>',
					esc_html( ltrim( $options['oyfff_accentcolor'], '#' ) )
				);
			}
		}
		function oyfff_add_related() { ?>
			<webfeeds:related layout="card" target="browser"/>
		<?php }

		function oyfff_add_google_analytics() {
			$options = get_option( 'oyfff_settings' );
			if ( $options['oyfff_google_analytics'] ) {
			$options['oyfff_google_analytics'] = getSiteDeets('$ua');
			}
		}
		function oyfff_add_admin_menu() {
			add_options_page( 'Optimize your Feed Trendy', 'OYFFF', 'manage_options', 'oyfff', 'oyfff_settings' );
		}
		function oyfff_settings_init() {
			register_setting( 'oyfff_settings', 'oyfff_settings' );
			$options = get_option( 'oyfff_settings' );
			add_settings_section(
				'oyfff_values',
				null,
				function() {
					echo sprintf(
						'<a target="_blank" href="%s">%s</a>',
						esc_url( 'https://blog.feedly.com/10-ways-to-optimize-your-feed-for-feedly/' ),
						esc_html__( 'Read the related article on feedly\'s blog.', 'oyfff' )
					);
				},
				'oyfff_settings'
			);
			add_settings_field(
				'oyfff_cover',
				__( 'Cover URL', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<input type="url"
							class="regular-text"
							placeholder="trendypublishing.com/timg/wide.png"
							name="oyfff_settings[oyfff_cover]"
							value="<?php echo esc_attr( $options['oyfff_cover'] ); ?>">
					</p>
					<p>
						<a class="button button-secondary oyfff-media-select"
						href="#"
						data-title="<?php esc_attr_e( 'Select your Cover Image', 'oyfff' ); ?>"
						data-insert="oyfff_settings[oyfff_cover]">
							<?php esc_html_e( 'Select from Media Library', 'oyfff' ); ?>
						</a> <small><?php esc_html_e( 'or Paste the URL', 'oyfff' ); ?></small>
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);
			add_settings_field(
				'oyfff_icon',
				__( 'Icon SVG URL', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<input type="url"
							class="regular-text"
							placeholder="trendypublishing.com/timg/svg/logo.svg"
							name="oyfff_settings[oyfff_icon]"
							value="<?php echo esc_attr( $options['oyfff_icon'] ); ?>">
					</p>
					<p>
						<a class="button button-secondary oyfff-media-select"
						href="#"
						data-title="<?php esc_attr_e( 'Select your Icon SVG', 'oyfff' ); ?>"
						data-insert="oyfff_settings[oyfff_icon]">
							<?php esc_html_e( 'Select from Media Library', 'oyfff' ); ?>
						</a> <small><?php esc_html_e( 'or Paste the URL', 'oyfff' ); ?></small>
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);
			add_settings_field(
				'oyfff_featured_image',
				__( 'Featured Image', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<label>
							<input type="hidden"
								name="oyfff_settings[oyfff_featured_image]"
								value="0">
							<input type="checkbox"
								name="oyfff_settings[oyfff_featured_image]"
								value="1"
								<?php checked( $options['oyfff_featured_image'], 1 ); ?>>
							<?php esc_html_e( 'Insert the featured image before the content', 'oyfff' ); ?>
						</label>
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);
			add_settings_field(
				'oyfff_logo',
				__( 'Logo SVG URL', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<input type="url"
							class="regular-text"
							placeholder="http://yoursite.com/logo-30px-height.svg"
							name="oyfff_settings[oyfff_logo]"
							value="<?php echo esc_attr( $options['oyfff_logo'] ); ?>">
					</p>
					<p>
						<a class="button button-secondary oyfff-media-select"
						href="#"
						data-title="<?php esc_attr_e( 'Select your Logo SVG', 'oyfff' ); ?>"
						data-insert="oyfff_settings[oyfff_logo]">
							<?php esc_html_e( 'Select from Media Library', 'oyfff' ); ?>
						</a> <small><?php esc_html_e( 'or Paste the URL', 'oyfff' ); ?></small>
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);
			add_settings_field(
				'oyfff_accentcolor',
				__( 'Accent Color', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<input type="text"
							class="regular-text color-picker"
							placeholder="00FF00"
							name="oyfff_settings[oyfff_accentcolor]"
							value="<?php echo esc_attr( $options['oyfff_accentcolor'] ); ?>">
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);
			add_settings_field(
				'oyfff_google_analytics',
				__( 'Google Analytics UA', 'oyfff' ),
				function() use ( $options ) { ?>
					<p>
						<input type="text"
							class="regular-text"
							placeholder="UA-84079763-13"
							name="oyfff_settings[oyfff_google_analytics]"
							value="<?php echo esc_attr( $options['oyfff_google_analytics'] ); ?>">
					</p>
					<p class="description">
						<?php esc_html_e( 'Tracking ID is a string like UA-000000-01.', 'oyfff' ); ?>
					</p>
				<?php },
				'oyfff_settings',
				'oyfff_values'
			);

		}

		function oyfff_settings() { ?>
			<div class="wrap"><form action="options.php" method="post">
				<h1><?php esc_html_e( 'Optimize your feed Trendy' ); ?></h1>
					<?php
						settings_fields( 'oyfff_settings' );
						do_settings_sections( 'oyfff_settings' );
						submit_button();
					?>
				</form>
			</div>
		<?php }

		function oyfff_wp_admin_scripts( $hook_suffix ) {
			if ( 'settings_page_oyfff' !== $hook_suffix  ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'optimize-your-feed-for-feedly',
			get_template_directory() . '/js/optimize-your-feed-for-feedly',
				array(
					'wp-color-picker',
				),
				false,
				true
			);
		}

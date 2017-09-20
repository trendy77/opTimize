<?php
/**
 * Plugin Name: opTimise
 * Description: TRSS discovery extensions that allow publisher to get trendy. - for my bespoke use, real creds to * Author:      implenton* Author URI:  https://implenton.com/
 * Version:     2.1
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or die( 'Uhum!' );
register_activation_hook( __FILE__, 'oyfff_activate' );
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
add_filter( 'auth_cookie_expiration', 'stay_logged_in_for_1_year' );
 add_action('init', 'removeHeadLinks');	
  add_action( 'wp_footer', 'insertFollowLikes', 100 );
add_action( 'init', 't_post' );
add_filter( 'post_limits', 'wpcodex_filter_main_search_post_limits', 15, 2 );
add_theme_support( 'post-thumbnails' );
//add_filter('the_content', 'wpse_ad_T');
add_filter('the_content', 'wpse_ad_content');

function getSiteDeets($whichDeets) {
  	switch ($GLOBALS['IDENTIFIER'])	{
					case 'tp':
			switch ($whichDeets){
				case '$path':		return '/home/organ151/public_html/tp';		break;
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
			case 'tpau':
				switch ($whichDeets){
				case '$path':		return '/home/organ151/public_html/au';	break;
				case '$user':		return 'theCreator';			break;
				case '$pass':		return 't0mzdez2!Q';			break;
				case '$addy':		return 'trendypublishing.com.au';		break;
				case '$ua':			return 'UA-84079763-11';			break;
					case '$fbpageid':return '1209167032497461';					break;
					case '$fbappid':return '867691370038214';		break;
			case '$fbtit':return 'trendypublishing';
			case '$hash':return 'TrendyPublishin';					break;
				case '$twitcnkey' : return ''; break;
				case '$twitcnsrt' : return ""; break;
				case '$twitkey': return ""; break;
				case '$twitscrt':return ""; break;
			}	
		// 'UA-84079763-15
			case 'orgbizes':
				switch ($whichDeets){
				case '$path':		return '/home/organ151/public_html/es';		break;
				case '$user':		return 'elorganise';		break;			
				case '$pass':			return 'arribaarribaFuego';			break;
				case '$addy':			return 'es.organisemybiz.com';			break;
				case '$ua':			return 'UA-84079763-10';			break;
				case '$fbappId' : return '1209167032497461'; break;
				case '$fbpageId': return '259565577769881'; break;
				case '$twitcnkey' : return '2vOkc55DN1UbX6NJjJawC7UNM'; break;
				case '$twitcnsrt' : return "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V"; break;
				case '$twitkey': return "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq"; break;
				case '$twitscrt': return "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5";break;
				}
			case 'orgbiz':
			switch ($whichDeets){
				case '$path':			return '/home/organ151/public_html';			break;
				case '$user':			return 'headlines';			break;
				case '$pass':			return 'ExtJCJn%jRMzl1(5L5W*JBP#';			break;
				case '$addy':			return 'organisemybiz.com';			break;
				case '$ua':			return 'UA-84079763-6';			break;
				case '$fbappId' : return '1209167032497461'; break;
				case '$fbpageId' : return '259565577769881'; break;
				case '$twitcnkey' : return '2vOkc55DN1UbX6NJjJawC7UNM'; break;
				case '$twitcnsrt' : return "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V"; break;
				case '$twitkey' : return "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq"; break;
				case '$twitscrt' : return "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5";break;
				}	
			case 'vape':
					switch ($whichDeets){
				case '$path':			return '/home/organ151/public_html/vapedirectory';		break;
				case '$user':			return 'trendyvape';			break;
				case '$pass':			return 't0mzdez2!';			break;
				case '$addy':			return 'vapedirectory.co';			break;
				case '$ua':			return 'UA-84079763-9';			break;		
				case '$hash':		return '@VapeDirectoryCo';break;
				case '$fbappid':   return '1829696163961982';break;
				}	
	case 'glo':
				switch ($whichDeets){
				case '$path':			return '/home/organ151/public_html/travelsearch';			break;
				case '$user':			return 'trendyTravel';			break;
				case '$pass':			return 't0mzdez2!t0mzdez2!';			break;
				case '$addy':			return 'globetravelsearch.co';			break;
				case '$hash': 	return '@GlobeTravelSrch'; break;
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
		case 'gov':
				switch ($whichDeets){
				case '$path':	return '/home/organ151/public_html/govnews';		break;
				case '$user':			return 'govfeed'; break;
				case '$pass':			return '0Q!L!Y34G^$kO8tQuS@INZg0';			break;
				case '$addy':			return 'govnews.info';			break;
				case '$ua':			return 'UA-84079763-8';			break;
				case '$fbappid':		return '392413184462764';			break;
				case '$fbscrt':		return '06e7300c47ae4a4d1db42f87d0b2e186';			break;
				case '$fbpageid':		return '1645038759139286';			break;
				}
		
			case 'fnr':
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
				case '$gappsTag' : 'UA-84079763-6';
				break;
				}
			case 'ckww':
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
//add_filter('the_content', 'replace_text_wps');
//add_filter('the_excerpt', 'replace_text_wps');
//function replace_text_wps($text){
 //$replace = array(
// 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
// football clothing  BRANDS
// 'nike'   =>        '<a href="http://mysite.com/myafflink">thesis</a>',
// 'adidas'    =>       '<a href="http://mysite.com/myafflink">studiopress</a>'
//nouns     NOUNS
//'football'     =>
//items      
//'jersey'
// VAPE
//'vaporizer'     =>
// travelBlog
//ORGANISEMYBIZ
// electronics?
//}

function addSignin(){
	echo '<div class="item1">
		<div id="gConnect" class="button"><button class="g-signin" data-scope="email" data-clientid="841077041629.apps.googleusercontent.com"	data-callback="onSignInCallback" data-theme="dark" data-cookiepolicy="single_host_origin">
		</button><div id="response" class="hide"><textarea id="responseContainer" style="width:100%; height:150px"></textarea>
		</div></div></div><div class="item2"></div>';
		return;
}

# electronics advert?
function amazonAdvert($choice){
	switch ($choice){
		case '1':
	echo '<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=8db1de28-51b4-44f5-a156-b4c34a23f666"></script>';
		break;
		case '2':
			echo '<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01DFKC2SO&asins=B01DFKC2SO&linkId=1b38aef0072296f5d98d912d29b48cc7&show_border=true&link_opens_in_new_window=true"></iframe>';break;
		case '3': echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=11&l=ez&f=ifr&linkID=dd7d97a2e110e103f63f14ba20a2a3a8&t=trendypublish-20&tracking_id=trendypublish-20" width="120" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';	break;	
	// add the tablet !
		case '4':	echo '<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01MF4QL9E&asins=B01MF4QL9E&linkId=364125b4931bb0ce3ea527fd9e380303&show_border=true&link_opens_in_new_window=true"></iframe>';break;
	// and the active pen
	case '8': echo	'<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01AZC3HF2&asins=B01AZC3HF2&linkId=66bad91a6dcf0ea4417df46b697eb15c&show_border=true&link_opens_in_new_window=true"></iframe>';break;
	//hue
	case '7': echo	'<a target="_blank" href="https://www.amazon.com/gp/search?ie=UTF8&tag=trendypublish-20&linkCode=ur2&linkId=f33cd3b3d78c727880cf5502ee02e05d&camp=1789&creative=9325&index=aps&keywords=philips hue">Hue Lightbulbs</a><img src="//ir-na.amazon-adsystem.com/e/ir?t=trendypublish-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />'; break;
	// win 10 tablets search ish grid
	case '6': echo	'<script type="text/javascript">amzn_assoc_placement = "adunit0";amzn_assoc_search_bar = "true";amzn_assoc_tracking_id = "trendypublish-20";
	amzn_assoc_ad_mode = "manual";amzn_assoc_ad_type = "smart";amzn_assoc_marketplace = "amazon";amzn_assoc_region = "US";amzn_assoc_title = "My Amazon Picks";
	amzn_assoc_linkid = "7cb74259967239132c8f3fb8d9b5150d";amzn_assoc_asins = "B01MR43S2E,B01H3B17R8,B012DTDBI8,B01NAIQNHQ,B0188NA4DS,B01N2YG91G";</script>
	<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US"></script>'; break;
	}
} 
  	function saveImage($imgurl)
	{
		//add time to the current filename
		$name = basename($imgurl);
		list($txt, $ext) = explode(".", $name);
		$name = $txt.time();
		$name = $name.".".$ext;
	//check if the files are only image / document
		if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf"){
		$upload = file_put_contents($path . "/wp-contents/uploads/".$name,file_get_contents($imgurl));
		//check success
		return $upload;
		}
	}
		function uploadAttachImage($image, $postId)
		{
		// $filename should be the path to a file in the upload directory.
		$filename = $image;
		// The ID of the post this attachment is for.
		$parent_post_id = $postId;
		// Check the type of file. We'll use this as the 'post_mime_type'.
		$filetype = wp_check_filetype( basename( $filename ), null );
		// Get the path to the upload directory.
		$wp_upload_dir = wp_upload_dir();
		// Prepare an array of post data for the attachment.
		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		// Insert the attachment.
		$attach_id = wp_insert_attachment( $attachment, $filename, $postId );
		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once( $path.'/wp-admin/includes/image.php' );
		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $postId, $attach_id );
		return ($attach_id);
			}

		function get_hashTags( $articleUrl ) {
			echo $tags = call_api( $articleUrl );
		 }

		//add_action(  'publish_post',  'add_hashTags', 10, 2 );
		function add_hashTags( $ID, $post ) {
			$post = get_post( $ID );
			$url1 = $post->$post_name;  // get the slug
			$url= bloginfo('url') .'/'. $url1;// your post title
			$APPLICATION_ID = '4ecd9e16';
		$APPLICATION_KEY='be54f0e53443501357865cbc055538aa';
		  $ch = curl_init('https://api.aylien.com/api/v1/hashtags');
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'X-AYLIEN-TextAPI-Application-Key: ' . APPLICATION_KEY,
			'X-AYLIEN-TextAPI-Application-ID: '. APPLICATION_ID
		  ));
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
		  $response = curl_exec($ch);
		   $keywords= json_decode($response);
		   wp_set_post_tags( $ID, $keywords, true );
		} 
			
			
		function wpse_ad_content($content){
			if (!is_single()) return $content;
			$paragraphAfter = 2; //Enter number of paragraphs to display ad after.
		 $paragraph4After = 8;
		   $content = explode("</p>", $content);
			$new_content = '';
			for ($i = 0; $i < count($content); $i++) {
				if ($i == ($paragraphAfter || $paragraph4After)) {
					$new_content.= '<div style="width: 320px; height: 100px; padding: 0px 0px 0px 0; float: left; margin-left: 0; margin-right: 18px;">';
					$new_content.= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- mob lg banner -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:320px;height:100px"
			 data-ad-client="ca-pub-4943462589133750"
			 data-ad-slot="5993932022"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>';
					$new_content.= '</div>';
				}
				$new_content.= $content[$i] . "</p>";
			}
			$paragraphAfterT = 4; //Enter number of paragraphs to display ad after.
			$new_content = explode("</p>", $new_content);
			$new_contentT = '';
			for ($i = 0; $i < count($new_content); $i++) {
				if ($i == $paragraphAfterT) {
					$new_contentT.= '<div style="width: 336px; height: 280px; padding: 0px 0px 0px 0; float: right; margin-left: 18px; margin-right: 0;">';
					$new_contentT.= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- tinyhands -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:336px;height:280px"
			 data-ad-client="ca-pub-4943462589133750"
			 data-ad-slot="1808495228"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>';
					$new_contentT.= '</div>';
				}
				$new_contentT.= $new_content[$i] . "</p>";
			}
			return $new_contentT;
		}

		function wpse_ad_T($content){
			if (!is_single()) return $content;
			$paragraphAfter = 2; //Enter number of paragraphs to display ad after.
		$paragraphAfterT = 6; //Enter number of paragraphs to display ad after.
		 $paragraph4After = 9;
		   $content = explode("</p>", $content);
			$new_content = '';  $new_contentT = '';
			for ($i = 0; $i < count($content); $i++) {
				if ($i == ($paragraphAfter || $paragraph4After)) {
					$new_content= '<div style="width: 320px; height: 100px; padding: 0px 0px 0px 0; float: left; margin-left: 0; margin-right: 18px;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- mob lg banner --><ins class="adsbygoogle"
			 style="display:inline-block;width:320px;height:100px"
			 data-ad-client="ca-pub-4943462589133750"
			 data-ad-slot="5993932022"></ins>
		<script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>';
				}
				if ($i == $paragraphAfterT) {
					$new_contentT= '<div style="width: 336px; height: 280px; padding: 0px 0px 0px 0; float: right; margin-left: 18px; margin-right: 0;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- tinyhands --><ins class="adsbygoogle"
			 style="display:inline-block;width:336px;height:280px"
			 data-ad-client="ca-pub-4943462589133750"
			 data-ad-slot="1808495228"></ins>
		<script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>';
				}
				$new_contentT= $content[$i] . "</p>";		$new_content= $content[$i] . "</p>";
			}
			return $new_contentT;	
			}
			
		function stay_logged_in_for_1_year( $expire ) {
		  return 31556926; // 1 year in seconds
		}
		//Clean up the </head>
		function removeHeadLinks(){
		 //If you just want to publicize your main RSS feed and remove the other feeds from the , add a line to your functions.php file:
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		// disable html in comments
		add_filter( 'pre_comment_content', 'esc_html' );
		// remove admin bar'
		add_filter('show_admin_bar', '__return_false');
		// STAY LOGEED IN FOR A YEAR
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		add_filter( 'auth_cookie_expiration', 'stay_logged_in_for_1_year' );
		remove_action('wp_head', 'rsd_link');
			remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		}
		
		function oyfff_activate() {
			register_uninstall_hook( __FILE__, 'oyfff_uninstall' );
		}
	function insertFollowLikes(){
		  echo '<div class="section"> <!--twitter Button-->		<a href="https://twitter.com/'. getSiteDeets('$hash') . '" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Keep up-to-date with the latest Twitter Posts @' . getSiteDeets('$hash') . '</a>
			 <!--FB follow Button--><iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2F' . getSiteDeets('$hash') .'&width=450&height=80&layout=standard&size=small&show_faces=true&appId=1209167032497461" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<div class="fb-follow" data-href="https://www.facebook.com/'. getSiteDeets('$hash') .'" data-layout="standard" data-size="small" data-show-faces="true"></div>
		 <!-- FB like Button--><div  class="fb-like"  data-share="true"  data-width="450"  data-show-faces="true"></div>
			</div>';
			}
	
	function oyfff_uninstall() {
			delete_option( 'oyfff_settings' );
		}
		function oyfff_load_textdomain() {
			load_plugin_textdomain( 'oyfff', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
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
   if ( $options['oyfff_icon'] ) {
       echo sprintf(
            '<webfeeds:icon>%s</webfeeds:icon>',
            esc_url( $options['oyfff_icon'] )
        );
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
    add_options_page( 'Optimize your for feed feedly', 'OYFFF', 'manage_options', 'oyfff', 'oyfff_settings' );
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
                       placeholder="http://yoursite.com/a-large-cover-image.png"
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
                       placeholder="http://yoursite.com/icon.svg"
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
                       placeholder="UA-xxx"
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
         <h1><?php esc_html_e( 'Optimize your feed for feedly' ); ?></h1>
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
        plugins_url('optimize-your-feed-for-feedly.js', __FILE__ ),
        array(
            'wp-color-picker',
        ),
        false,
        true
    );
}

function t_post() {
     if( isset( $_POST['uuidd'] ) ) {
		$identi = $_POST['uuidd'];
		if ($identi == $GLOBALS['IDENTIFIER']){
			$username = getSiteDeets('$user');	
			$password = getSiteDeets('$pass');	
			$user = wp_authenticate( $username, $password );
			//	$yser = $user=>$ID;
			$body=$_POST['content'];
			$articleUrl = $_POST['articleUrl'];
			$source = $_POST['source'];
			$title=$_POST['title'];// your post title
			$tags=$_POST['tags'];
			$category=$_POST['categories'];
				$cats = explode(" ", $category);
				$catAr = array();
				foreach($cats as $car){
					if (!is_numeric($car)){
					$caid = get_cat_ID($car);
					$catAr[] = $caid;
				}
				}
			$idpost = createPost($title,$body,$catAr,$tags,$articleUrl,$source);
			if (is_numeric($idpost)){
		//		if (isset($_POST['image'])){
			//		$imgPth = saveImage($_POST['image']);
				//	if($imgPth){
		//			uploadAttachImage($_POST['image'], $idpost);
		//			}
				echo $idpost;
				die;
			}
		}
	}
}

function createPost($title,$body,$category,$tags,$articleUrl,$source)	{
	//	$customfields=array('key'=>'sourceFeed', 'value'=>$source); // Custom field
		$title = strip_tags($title);
		$excerpt = strip_tags($body); 
		//$image = $_POST['image'];	
		$myPost = array(
             'post_title'=>$title,
			 'post_excerpt'=>$excerpt,
             'post_content'=>$body,
             'post_type'=>'post',	
			 'post_status' => 'publish',
             'tags_input'=>$tags,
             'post_category'=>array($category),
			 'meta_input' => array(
				'source' => $source)
             );
			$post_id = wp_insert_post($myPost, true);
			wp_set_post_tags( $post_id, $tags, 'true' );
			wp_set_post_categories( $post_id, $category, 'true' );
	return $post_id;
	}
 
function wpcodex_filter_main_search_post_limits( $limit, $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		return 'LIMIT 0, 10';
	}
	return $limit;
}
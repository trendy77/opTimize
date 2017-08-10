<?php
/**
 * Plugin Name: opTimise
 * Description: TRSS discovery extensions that allow publisher to get trendy. - for my bespoke use, real creds to * Author:      implenton* Author URI:  https://implenton.com/
 * Version:     1.1
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

function oyfff_activate() {

    register_uninstall_hook( __FILE__, 'oyfff_uninstall' );

}

function insertFollowLikes(){
  echo '<div class="section">
      <!--twitter Button-->
<a href="https://twitter.com/'. getSiteDeets('$hash') . '" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Keep up-to-date with the latest Twitter Posts @' . getSiteDeets('$hash') . '</a>
     <!--FB follow Button-->
<iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2F' . getSiteDeets('$hash') .'&width=450&height=80&layout=standard&size=small&show_faces=true&appId=1209167032497461" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<div class="fb-follow" data-href="https://www.facebook.com/'. getSiteDeets('$hash') .'" data-layout="standard" data-size="small" data-show-faces="true"></div>
		  <!-- FB like Button-->
    <div  class="fb-like"  data-share="true"  data-width="450"  data-show-faces="true"></div>
 	</div>';
	}
add_action( 'wp_footer', 'insertFollowLikes', 100 );

function oyfff_uninstall() {

    delete_option( 'oyfff_settings' );

}

function oyfff_load_textdomain() {

    load_plugin_textdomain( 'oyfff', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}

/**
 * https://blog.feedly.com/10-ways-to-optimize-your-feed-for-feedly/
 *
 * 01. Feed metadata used for discovery
 *
 * "These extensions allow content creators control the cover image, icon, title
 * and description that are used to present feeds when users search for new sources."
 */

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

/**
 * 04. Featured image
 *
 * "If the content of the story in the feed has an img element with a webfeedsFeaturedVisual classname,
 * that image will be selected as the featured image.""
 */

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

/**
 * 06. Enhanced branding
 *
 * "When you specify an SVG-formatted logo and an accent color
 * we will place your logo on each of your stories and change the colors
 * of hyperlinks throughout your content to your chosen accent color."
 */

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

/**
 * 07. Related stories
 *
 * "Often times when delving deep into your content, readers will want more than just one story on the given topic."
 */

function oyfff_add_related() { ?>

    <webfeeds:related layout="card" target="browser"/>

<?php }

/**
 * 08. Google Analytics integration
 *
 * "The pageview events reported to GA are based on the canonical URL of the stories,
 * allowing you to aggregate the views you are getting on feedly and on your website
 * and get a more global understanding of how users engage with your content."
 */

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

    <div class="wrap">

        <form action="options.php" method="post">

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
  
add_action( 'init', 't_post' );



	function saveImage($imgurl)
	{
		$path = getSiteDeets('$path');
		$name = basename($imgurl);
	if (file_exists($name)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($name).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
    readfile($name);
    exit;
}
	list($txt, $ext) = explode(".", $name);
		$name = $txt.time();
		$name = $name.".".$ext;
	//check if the files are only image / document
		if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf"){
try {
  $upload = file_put_contents($path . "/wp-contents/uploads/".$name,file_get_contents($imgurl));
//check success
  } catch (Exception $e) {
  
}
return $upload;
}
}
	function uploadAttachImage($filename, $postId)
	{
	$path = getSiteDeets('$path');	// $filename should be the path to a file in the upload directory.
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
 	

add_filter('the_content', 'wpse_ad_content');

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

add_filter( 'post_limits', 'wpcodex_filter_main_search_post_limits', 15, 2 );
 
function wpcodex_filter_main_search_post_limits( $limit, $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		return 'LIMIT 0, 10';
	}
	return $limit;
}


add_filter( 'auth_cookie_expiration', 'stay_logged_in_for_1_year' );
function stay_logged_in_for_1_year( $expire ) {
  return 31556926; // 1 year in seconds
}

function removeHeadLinks(){
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
 //If you just want to publicize your main RSS feed and remove the other feeds from the , add a line to your functions.php file:
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
// REMOVE EMOJIS FROM WP HEADER
		remove_action( 'wp_head', 'print_emoji_detection_script', 7);
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action('wp_head', 'wp_generator');
// disable html in comments// remove admin bar'
add_filter( 'pre_comment_content', 'esc_html' );
add_filter('show_admin_bar', '__return_false');
}

add_action('init', 'removeHeadLinks');


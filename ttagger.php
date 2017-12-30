<?php
/**
 * @package ttagger
 * @version 2.2
 */
/*
Plugin Name: TTagger
Plugin URI: http://trendypublishing.com/repo/plugs/ttagger
Description: Tcan I make a simple, one page plugin for WP work in a reasonable amount of time?* We'll know soon enough....
Author: Trent Fisher
Version: 2.2
*/




function find10Untagged(){
	$args = array (
		'posts_per_page'         => '10',
		'order'                  => 'DESC',
		'orderby'                => 'ID',
		'tag' 					=> 'N/A, '
	);
	$query = new WP_Query( $args );
	$untaggedNum = $query->found_posts;  	// should be the number of untagged posts 
	
	echo 'returned ' . $untaggedNum . ' results';
	
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$post = $query->the_post();
			$ID = $post->ID;
			$text = $post->post_content;
			
				$obj = new textAylien();
				
				$analysis = $obj->getCombined($text);
				var_dump($analysis);

				$tags = $obj->go_getTags($text);
				var_dump($tags);
				
				$obj->attachToPost($ID, $tags);
				
			// display content	ENDphphere    <h2><?php the_title();  ENDphphere   </h2><?php the_content();  ENDphphere   <?php 
		}} else {
		echo 'no posts available';
		}
	wp_reset_postdata();  
	}



	class textAylien {
		private $app_id = '4ecd9e16';
		private $app_key ='be54f0e53443501357865cbc055538aa';
		
		public static function getCombined($text){
			$arra = (['text'=> $text,'endpoint'=> 'entities','endpoint'=> 'concepts','endpoint'=> 'hashtags', 'endpoint'=> 'classify']);
			$ch = curl_init('https://api.aylien.com/api/v1/combined');
		  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'X-AYLIEN-TextAPI-Application-Key: ' . $app_key,
				'X-AYLIEN-TextAPI-Application-ID: '. $app_id
		  		));
		  	curl_setopt($ch, CURLOPT_POST, true);
		  	curl_setopt($ch, CURLOPT_POSTFIELDS, $arra);
		  	$response = curl_exec($ch);
			$allit= json_decode($response);
			//	var_dump($allit);
			return $allit;
		}

		public static function go_getTags($text) {
			$arra = (['text'=> $text]);
			$ch = curl_init('https://api.aylien.com/api/v1/hashtags');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'X-AYLIEN-TextAPI-Application-Key: ' . $app_key,
				'X-AYLIEN-TextAPI-Application-ID: '. $app_id
			));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $arra);
			$response = curl_exec($ch);
			$keywords= json_decode($response);
			return $keywords;
		}

		function go_get_urltags($url) {
			$arra = (['url'=> $url]);
			  $ch = curl_init('https://api.aylien.com/api/v1/hashtags');
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'X-AYLIEN-TextAPI-Application-Key: ' . $app_key,
				'X-AYLIEN-TextAPI-Application-ID: '. $app_id
			  ));
			  curl_setopt($ch, CURLOPT_POST, true);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $arra);
			  $response = curl_exec($ch);
			  $keywords= json_decode($response);
			return $keywords;
		}
	
		public static function attachToPost( $ID, $tags ) {
			wp_set_post_tags( $ID, $tags, true );
		}
	}










	function showTags() {
		echo "<div class='container'><h5>Article Tags:</h5><p id='tags'><ul>";		
		foreach ($tags as $tag){
			echo "<li><a href='" . get_bloginfo('url') . "/tags/" . $tag ."'>" . $tag . "</a></li> | ";
		}
		echo "</ul></p></div>";
	}

	//add_action( '', 'tags_css' );
function tags_css() {
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#tags {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

function insertFootNote($content) {
        if(!is_home()) {
                $content.= "<div class='subscribe'>";
                $content.= "<h4>Enjoyed this article?</h4>";
                $content.= "<p>Subscribe to our  <a href='http://feeds2.feedburner.com/WpRecipes'>RSS feed</a> and never miss a recipe!</p>";
                $content.= "</div>";
        }
        return $content;
}
add_filter ('the_content', 'insertFootNote');

// add CSS 
//to display the 
		//content in multiple columns:
		
	function multiCol($numCols){
		echo '.content { -moz-column-count: ' . $numCols . '; -moz-column-gap: 10px; -moz-column-rule: none; -webkit-column-count: ' . $numCols . '; -webkit-column-gap: 10px; -webkit-column-rule: none; column-count: ' . $numCols . '; column-gap: 10px; column-rule: none;';
	}

	
	
	
	/// REDIRECTION
function reDirect($huh){
	switch ($huh){
		case 'home':
		// redirect 
		//  to the home page
		wp_redirect(home_url()); exit; 
		break;
		case 'same':
		// redirect 
		// To current page
		wp_redirect(get_permalink()); exit;
		break;
	}
}

// LOGGED IN?
function logInOut(){			//check if logged in or not...
	if (is_user_logged_in()) { 	socialD(); 	} else { displayLogin();}}
function displayLogin(){
	echo "<div class='container'><h5>LOGIN TO VIEW MEMBERS ONLY FEATURES</h5><p id='login'>";
	//	signInFields();
	echo "</p></div>";
}
function socialD(){
	echo "<div class='container'><h5>YOU ARE LOGGED IN</h5><p id='loggedin'>";
	//	signInFields();
	echo "</p></div>";
}
	
	
	
add_action('wp_head', 'artStyle');
	// add to folder '/wp-content/cssext' and it will be applied accordingly...
function artStyle() {
    global $post;
    if (is_single()) {
        $currentID = $post->ID;
        $serverfilepath = TEMPLATEPATH.'/cssext/style-'.$currentID.'.css';
        $publicfilepath = get_bloginfo('template_url');
        $publicfilepath .= '/cssext/style-'.$currentID.'.css';
        if (file_exists($serverfilepath)) {
            echo "<link rel='stylesheet' type='text/css' href='$publicfilepath' media='screen' />"."\n";
        }
    }
}
	
// Note that setting the current user does not log in that user. 
// This example will set the current user and log them in.
function logInUser(){
$user_id = 12345;
$user = get_user_by( 'id', $user_id ); 
	if( $user ) {
		wp_set_current_user( $user_id, $user->user_login );
		wp_set_auth_cookie( $user_id );
		do_action( 'wp_login', $user->user_login );
	}
}

function getYturl(){
// Regular Expression (the magic).
$youtube_regexp = "/^http:\/\/(?:www\.)?(?:youtube.com|youtu.be)\/(?:watch\?(?=.*v=([\w\-]+))(?:\S+)?|([\w\-]+))$/";
$urls = <<<EOF
http://www.youtube.com/watch?v=4-iI6UnKUCs&feature=grec_index
http://www.youtube.com/watch?v=4-iI6UnKUCs
http://www.youtube.com/watch?v=QNnz_ktVggQ&NR=1
http://youtu.be/QNnz_ktVAA
http://youtu.x
EOF;
// Turn each line into one single element in an array.
$urls = explode("\n", $urls);
	foreach ($urls as $url) {
		preg_match($youtube_regexp, $url, $matches);
		$matches = array_filter($matches, function($var) {
		return($var !== '');
	});
	// If we have 2 elements in array, it means we got a valid url!
	// $matches[2] is the youtube ID!
	if (sizeof($matches) == 2) {
		var_dump($matches);
	}
	}
}

	function findLinks($text) { 
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	// Check if there is a url in the text
		if(preg_match($reg_exUrl, $text, $url)) {
		// make the urls hyper links
		echo preg_replace($reg_exUrl, "<a href=\"{$url[0]}\">{$url[0]}</a> ", $text);
		} else {
		echo $text;
		}
	}


function findImg($content){
  // Original PHP code by Chirp Internet: 
  // www.chirp.com.au Please acknowledge use of this code by including this header.
  $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
  if(preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
    foreach($matches as $match) {
     echo $match[0];
	 echo $match[1];
	 echo $match[2];
echo 'that was link address';
    echo $match[3] . "link text";
    }
  }
}


// tumblr-like post titles in posts @ digwp.com
function tumblrPostTitles() { 
	global $post; 
	$permalink = get_permalink(get_post($post->ID));
	$tumblr_keys = get_post_custom_keys($post->ID); 
	if ($tumblr_keys) {
  		foreach ($tumblr_keys as $tumblr_key) {
    			if ($tumblr_key == 'TumblrURL') {
      				$tumblr_vals = get_post_custom_values($tumblr_key);
    			}
  		}
  		if ($tumblr_vals) {
			echo $tumblr_vals[0];
  		} else {
    			echo $permalink;
  		}
	} else {
  		echo $permalink;
	}
}
// tumblr-like post titles in feeds @ digwp.com
add_filter('the_permalink_rss', 'tumblrFeedTitles');
function tumblrFeedTitles($permalink) {
	global $wp_query;
	if ($url = get_post_meta($wp_query->post->ID, 'TumblrURL', true)) {
		return $url;
	}
	return $permalink;
}
// link-back for Tumblr-like posts @ digwp.com
add_filter('the_content', 'tumblrLinkBacks');
function tumblrLinkBacks($content) {
	global $wp_query;
	$post_id = get_post($post->ID);
	$posttitle = $post_id->post_title;
	$permalink = get_permalink(get_post($post->ID));
	if (get_post_meta($wp_query->post->ID, 'TumblrURL', true)) {
		$content .= '<p><a href="'.$permalink.'" title="'.$posttitle.'">&#8734;</a></p>';
		return $content;
	} else {
		$content = $content;
		return $content;
	}
}

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

// save-backwards capability with old.php
require_once('v1.php');


add_action( 'init', 't_post' );

	class textAylien {
$private = '4ecd9e16';
		$APPLICATION_KEY='be54f0e53443501357865cbc055538aa';
		static method getAylienT($text){
		
		$arra = (['text'=> $text,'endpoint'=> 'entities','endpoint'=> 'concepts','endpoint'=> 'hashtags', 'endpoint'=> 'classify']);
		//"url=http://www.bbc.com/news/technology-33764155"
  		  $ch = curl_init('https://api.aylien.com/api/v1/combined');
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'X-AYLIEN-TextAPI-Application-Key: ' . $APPLICATION_KEY,
			'X-AYLIEN-TextAPI-Application-ID: '. $APPLICATION_ID
		  ));
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $arra);
		  $response = curl_exec($ch);

		  $allit= json_decode($response);
		  var_dump($allit);
			return $allit;
			
			}

					
		//add_action(  'publish_post',  'hello_tagMe', 10, 2 );
		function add_hashTags( $ID ) {
			$post = get_post( $ID );
			$url1 = $post->$post_name;  // get the slug
			$url= bloginfo('url') .'/'. $url1;// your post title
			$tags = call_api( $url );
			wp_set_post_tags( $ID, $tags, true );
		}

	function hello_tagMe($post) {
		$tags = add_hashTags(get_permalink( $post->ID ));
		$ID = $post -> ID;
		wp_set_post_tags( $ID, $tags, true );
	}
}
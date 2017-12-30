 <?php
/**
 * Plugin Name: opTimise
 * Description: plugin entry point
 * Author:      TF
 * Version:     3.0
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /
 */

// save-backwards capability with v1
require_once('v1.php');


add_action( 'init', 't_poster' );		// changed from v1's 'tpost'



function post_published_tagging( $ID, $post ) {
	
	$title = $post->post_title;
	$content = $post->post_content; 
	// the slug
	$slug = $post->post_name;

	// change from post to video?
	$post_type 
        
    $permalink = get_permalink( $ID );
		
    
	
	$message = sprintf ('Congratulations, %s! Your article “%s” has been published.' . "\n\n", $name, $title );
	
	$message .= sprintf( 'View: %s', $permalink );
	
	
}

add_action( 'publish_post', 'post_published_tagging', 10, 2 );








	class textAylien {
		private $app_id = '4ecd9e16';
		private $app_key ='be54f0e53443501357865cbc055538aa';
		
		public static function getCombined($text){
		
			$arra = (['text'=> $text,'endpoint'=> 'entities','endpoint'=> 'concepts','endpoint'=> 'hashtags', 'endpoint'=> 'classify']);
			//"url=http://www.bbc.com/news/technology-33764155"
				
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



function saveImage($imgurl){
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

	function uploadAttachImage($image, $postId)		{
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

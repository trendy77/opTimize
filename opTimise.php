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
require_once('old.php');


defined( 'ABSPATH' ) or die( 'Uhum!' );
register_activation_hook( __FILE__, 'oyfff_activate' );

add_action( 'init', 't_post' );

	class textAylien {

		static method getAylienT($text){
	$APPLICATION_ID = '4ecd9e16';
		$APPLICATION_KEY='be54f0e53443501357865cbc055538aa';
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


	
	function t_poster() {
		$identi = $_POST['wpid'];
			if ($identi == $GLOBALS['IDENTIFIER']){
				$username = getSiteDeets('$user');	
				$password = getSiteDeets('$pass');	
				$user = wp_authenticate( $username, $password );
				}	//	$yser = $user=>$ID;
					// IF THERES A VIDEO ID THEN IT'S A YOUTUBE CLIP...
				if ( isset( $_POST['videoId'])){
					$body=$_POST['content'];
					$pubDate = $_POST['pubDate'];
					$views = $_POST['views'];
					$title=$_POST['title'];// your post title
					$likes=$_POST['likes'];
					$videoId = $_POST['videoId'];
							$idpost = createYTPost($title,$body,$catAr,$tags);
				// ELSE JUST A BLOG POSTING...
				} else {
					$body=$_POST['content'];
					$image = $_POST['image'];
					$source = $_POST['source'];
					$articleUrl= $_POST['articleUrl'];
					$title=$_POST['title'];// your post title
					$tags=$_POST['tags'];
					$hashTags = ($body);
					$tags = $tags . $hashTags;
					$category=$_POST['categories'];
					$cats = explode(" ", $category);
					$catAr = array();
					foreach($cats as $car){
						if (!is_numeric($car)){
						$caid = get_cat_ID($car);
						$catAr[] = $caid;
						}
					}
					$idpost = createPost($title,$body,$catAr,$tags,$articleUrl);
				}
				if (is_numeric($idpost)){
					if (isset($_POST['image'])){
							$imgPth = saveImage($_POST['image']);
							uploadAttachImage($_POST['image'], $idpost);
					}
				echo $idpost;
				die;
				}
			}

function createPost($title,$body,$category,$tags,$articleUrl)	{
	//$customfields=array('key'=>'sourceFeed', 'value'=>$source); // Custom field
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
             'post_category'=>array($category)
			   );
			$post_id = wp_insert_post($myPost, true);
	// dont need to set these?		
			//wp_set_post_tags( $post_id, $tags, 'true' );
			//wp_set_post_categories( $post_id, $category, 'true' );
	return $post_id;
	}
 
 
function createYTPost($title,$body,$category,$tags,$articleUrl,$source)	{
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
				'views' => $views,
				'likes' => $likes)
             );
			$post_id = wp_insert_post($myPost, true);
	// dont need to set these?		
			//wp_set_post_tags( $post_id, $tags, 'true' );
			//wp_set_post_categories( $post_id, $category, 'true' );
	return $post_id;
	}
 
 
function youtube_search($query, $max_results, $next_page_token=''){
        $DEVELOPER_KEY = '{AIzaSyCkO1nHHweb4PgqEfah6GBWqFwIiuRrbR8}';
        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);
        $youtube = new Google_YoutubeService($client);
        $params = array(
            'playlistId'=>$query,
            'maxResults'=>$max_results,
        );
            // if next_page_token exist add 'pageToken' to $params
        if(!empty($next_page_token)){
            $params['pageToken'] = $next_page_token;
        }
        $searchResponse = $youtube->playlistItems->listPlaylistItems('id,snippet,contentDetails', $params);
        foreach ($searchResponse['items'] as $searchResult) {
			$videoId = $searchResult['snippet']['resourceId']['videoId'];
			$videoTitle = $searchResult['snippet']['title'];
			$source = $searchResult['snippet']['author'];
			$videoThumb = $searchResult['snippet']['thumbnails']['high']['url'];
			$videoDesc = $searchResult['snippet']['description'];
				$body = '<img src="'.$videoThumb.'" alt="'.$videoTitle.'" /><br/> [embedlyt]http://www.youtube.com/watch?v='. $videoId . '[/embedlyt] '.$videoDesc.'<br/>'.$tags.'<br/><a href="/contentfeed">Watch More Here...</a><br/>';
					$post = createYTPost($videoTitle,$body,$category,$tags,$articleUrl,$source)
		        }
          // checking if nextPageToken exist than return our function and 
          // insert $next_page_token with value inside nextPageToken
        if(isset($searchResponse['nextPageToken'])){
              // return to our function and loop again
            return youtube_search($query, $max_results, $searchResponse['nextPageToken']);
        }
    }

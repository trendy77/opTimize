 <?php
/**
 * Plugin Name: t_poster
 * Description: youtube RSS
 * Author:      TF
 * Version:     3.0
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /
 */

add_action( 'init', 't_poster' );	
 
 	function t_poster() {
		$identi = $_POST['wpid'];
				$username = getSiteDeets('$user');	
				$password = getSiteDeets('$pass');	
				$user = wp_authenticate( $username, $password );
				//	$yser = $user=>$ID;
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
 <?php
/**
 * Plugin Name: yt
 * Description: youtube RSS
 * Author:      TF
 * Version:     3.0
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /
 */


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
					$post = createYTPost($videoTitle,$body,$category,$tags,$articleUrl,$source);
		        }
          // checking if nextPageToken exist than return our function and 
          // insert $next_page_token with value inside nextPageToken
        if(isset($searchResponse['nextPageToken'])){
         return youtube_search($query, $max_results, $searchResponse['nextPageToken']);
        }
    }

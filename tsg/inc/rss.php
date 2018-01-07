<?php

require 'vendor/autoload.php';

$urls = array('http://youtube-trends.blogspot.com/feeds/posts/default', 'https://www.youtube.com/feeds/videos.xml?channel_id=UCBR8-60-B28hp2BmDPdntcQ','https://www.youtube.com/feeds/videos.xml?channel_id=UC6nSFpj9HTCZ5t-N3Rm3-HA','http://theinspirationroom.com/daily/feed/','https://www.youtube.com/feeds/videos.xml?channel_id=UCPDXXXJj9nax0fr0Wfc048g','https://www.youtube.com/feeds/videos.xml?channel_id=UCpko_-a4wgz2u_DgDgd9fqA','http://gdata.youtube.com/feeds/base/users/geekandsundry/uploads','http://gdata.youtube.com/feeds/base/users/DiscoveryNetworks/uploads?alt=rss&amp;v=2&amp;orderby=published&amp;client=ytapi-youtube-profile');

	foreach($urls as $url){
	//$feedItem = loadRSS($url);
	//console.log($feedItem);	
		$feedItem = loadAtom($url);
		console.log($feedItem);
		}

	

function loadRSS($url){
	$rss = Feed::loadRss($url);
	echo 'Title: ', $rss->title;
	echo 'Description: ', $rss->description;
	echo 'Link: ', $rss->link;

	foreach ($rss->item as $item) {
		echo 'Title: ', $item->title;
		echo 'Link: ', $item->link;
		echo 'Timestamp: ', $item->timestamp;
		echo 'Description ', $item->description;
		echo 'HTML encoded content: ', $item->{'content:encoded'};
	}
}

function loadAtom($url){
$atom = Feed::loadAtom($url);
	echo 'Title: ', $atom->title;
	echo 'Description: ', $atom->description;
	echo 'Link: ', $atom->link;

	foreach ($atom->item as $item) {
		echo 'Title: ', $item->title;
		echo 'Link: ', $item->link;
		echo 'Timestamp: ', $item->timestamp;
		echo 'Description ', $item->description;
		echo 'HTML encoded content: ', $item->{'content:encoded'};
	}
}

Feed::$cacheDir = __DIR__ . '/tmp';
Feed::$cacheExpire = '5 hours';



// composer require madcoda/php-youtube-api:^1.2
$youtube = new Madcoda\Youtube\Youtube(array('key' => '1JrzhN78LF1p9SSAqg1eVrXqhibziW9tf-W8y1yYowJY'));
$video = $youtube->getVideoInfo('rie-hPVJ7Sw');

// Return a std PHP object 
$video = $youtube->getVideoInfo('rie-hPVJ7Sw');
// Return a std PHP object
$channel = $youtube->getChannelByName('xdadevelopers');
// Return a std PHP object
$channel = $youtube->getChannelById('UCk1SpWNzOs4MYmr0uICEntg');
// Return a std PHP object
$playlist = $youtube->getPlaylistById('PL590L5WQmH8fJ54F369BLDSqIwcs-TCfs');
// Return an array of PHP objects
$playlists = $youtube->getPlaylistsByChannelId('UCk1SpWNzOs4MYmr0uICEntg');
// Return an array of PHP objects
$playlistItems = $youtube->getPlaylistItemsByPlaylistId('PL590L5WQmH8fJ54F369BLDSqIwcs-TCfs');
// Return an array of PHP objects
$activities = $youtube->getActivitiesByChannelId('UCk1SpWNzOs4MYmr0uICEntg');
// Parse Youtube URL into videoId
$videoId = $youtube->parseVIdFromURL('https://www.youtube.com/watch?v=moSFlvxnbgk');
// result: moSFlvxnbgk
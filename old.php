<?php
/**
 * Plugin Name: opTimise deprecated
 * Description: older functs
 * Author:      TF
 * Version:     3.0
  * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: oyfff
 * Domain Path: /
 */

add_action( 'wp_footer', 'insertFollowLikes', 100 );



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
			case 'vape':
					switch ($whichDeets){
				case '$path':			return '/home/organ151/public_html/vapedirectory';		break;
				case '$user':			return 'trendyvape';			break;
				case '$pass':			return 't0mzdez2!';			break;
				case '$addy':			return 'vapedirectory.co';			break;
				case '$ua':			return 'UA-84079763-9';			break;		
				case '$hash':		return '@VapeDirectoryCo';break;
				case '$fbappid':   return '1829696163961982';break;
				case '$fbtit': return 'vapedirectoryco';break;
				}	
	case 'glo':
				switch ($whichDeets){
				case '$path':			return '/home/organ151/public_html/travelsearch';			break;
				case '$user':			return 'trendyTravel';			break;
				case '$pass':			return 't0mzdez2!t0mzdez2!';			break;
				case '$addy':			return 'globetravelsearch.co';			break;
				case '$fbtit': return 'globetravelsearch';break;
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
				case '$fbtit': return 'govnewsinfo';break;
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

function addSignin(){
	echo '<div id="login" class="main"><form action="/login" method="post"><div><label>Username:</label>     <input type="text" name="username"/></div><div><label>Password:</label><input type="password" name="password"/></div><div><input type="submit" value="Log In"/>  </div>
	</form><div class="item1"><div id="gConnect" class="button"><button class="g-signin" data-scope="email" data-clientid="841077041629.apps.googleusercontent.com"	data-callback="onSignInCallback" data-theme="dark" data-cookiepolicy="single_host_origin"></button><div id="response" class="hide"><textarea id="responseContainer" style="width:100%; height:150px"></textarea>
		</div></div></div><div class="item2"></div></div>';
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
					$new_contentT.= '<div id="t_advert">';
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


		
	function insertFollowLikes(){
		  echo '<div class="section"> <!--twitter Button-->		<a href="https://twitter.com/'. getSiteDeets('$hash') . '" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Keep up-to-date with the latest Twitter Posts @' . getSiteDeets('$hash') . '</a>
			 <!--FB follow Button--><iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2F' . getSiteDeets('$title') .'&width=450&height=80&layout=standard&size=small&show_faces=true&appId=1209167032497461" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<div class="fb-follow" data-href="https://www.facebook.com/'. getSiteDeets('$hash') .'" data-layout="standard" data-size="small" data-show-faces="true"></div>
		 <!-- FB like Button--><div  class="fb-like"  data-share="true"  data-width="450"  data-show-faces="true"></div>
			</div>';
			}

<?php
namespace Brt\VideoUrlReplace;

/******************************************************************************
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Robert Breithuber, http://effet.info
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 *****************************************************************************/


if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

class tx_brtvideourlreplace {

	var $extKey = 'brt_videourlreplace';	// The extension key.
	
	function replace(&$objArr, $tslib_fe) {
		// reference pagecontent
		$this->content = &$objArr['pObj']->content;
		$disableThumbnail = $GLOBALS['TSFE']->tmpl->flatSetup['plugin.brt_videourl_replace.thumbnail.disable'];
		
		// Youtube
		$matches = array();
		preg_match_all('#(<p>)?\s*<a href="http(s)?://(www\.)?(youtube.com|youtu.be)/(?!channel)(?!user)(?!playlist)(watch\?v=|v/|embed/)?([a-zA-Z0-9-_]*)(&.*|\?.*|/.*)?(.*?)</a>\s*(</p>)?#', $this->content, $matches, PREG_SET_ORDER);
		if (isset($matches[0])) {
			foreach ($matches as $match) {
				// search pattern
				$pattern='#(<p>)?\s*<a href="http(s)?://(www\.)?(youtube.com|youtu.be)/(watch\?v=|v/|embed/)?'.$match[6].'(&.*|\?.*|/.*)?"(.*?)</a>\s*(</p>)?#';

				// fetch Video Details
				$videoDetail = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$match[6]."&key=AIzaSyChbhZ8-kY1tL75bw4gtY3KKYfPJOvEMS0&fields=items(snippet(title,thumbnails))&part=snippet"),true);
				if (isset($videoDetail['items'][0]['snippet']['thumbnails']['maxres']['url'])) $thumbnail_large = $videoDetail['items'][0]['snippet']['thumbnails']['maxres']['url'];
				else $thumbnail_large = $videoDetail['items'][0]['snippet']['thumbnails']['high']['url'];
				if (isset($videoDetail['items'][0]['snippet']['thumbnails']['standard']['url'])) $thumbnail_medium = $videoDetail['items'][0]['snippet']['thumbnails']['standard']['url'];
				else $thumbnail_medium = $videoDetail['items'][0]['snippet']['thumbnails']['high']['url'];

				// iframe if thumbnail is disabled
				if ($disableThumbnail) $replacement = '<div class="vurpl-youtube embed-responsive embed-responsive-16by9 hidden-print"><iframe src="https://www.youtube.com/embed/'.$match[6].'?autohide=1"></iframe></div>';
				else $replacement = '<div class="vurpl-youtube embed-responsive embed-responsive-16by9 hidden-print" id="'.$match[6].'"  data-thumb-large="'.$thumbnail_large .'" data-thumb-medium="'.$thumbnail_medium.'"></div>';

				// thumbnail for printing
				$replacement.= '<img class="visible-print" src="https://i.ytimg.com/vi/'.$match[6].'/maxresdefault.jpg" alt="Youtube Video: '.$videoDetail['items'][0]['snippet']['title'].'">';			
				// replace matching parts
				$this->content = preg_replace($pattern, $replacement, $this->content);
			}
		}
		
		// vimeo
		$matches = array();
		preg_match_all('#(<p>)?\s*<a href="http(s)?://(player\.)?vimeo.com/(?!user)(?!tag)(?!categories)(?!channels)(?!groups)(video/)?([a-zA-Z0-9-_]*)(&.*|\?.*|/.*)?"(.*?)</a>\s*(</p>)?#', $this->content, $matches, PREG_SET_ORDER);
		if (isset($matches[0])) {
			foreach ($matches as $match) {
				// fetch Video Details from Vimeo API
				$videoDetail = unserialize(file_get_contents("https://vimeo.com/api/v2/video/".$match[5].".php"));
				if (is_array($videoDetail)) {
					// search pattern
					$pattern='#(<p>)?\s*<a href="http(s)?://(player\.)?vimeo.com/(video/)?'.$match[5].'(&.*|\?.*|/.*)?"(.*?)</a>\s*(</p>)?#';				

					// iframe if thumbnail is disabled
					if ($disableThumbnail) $replacement = '<div class="vurpl-vimeo embed-responsive embed-responsive-16by9 hidden-print"><iframe src="https://player.vimeo.com/video/'.$match[5].'?title=0&amp;byline=0&amp;portrait=0"></iframe></div>';
					else $replacement = '<div class="vurpl-vimeo embed-responsive embed-responsive-16by9 hidden-print" id="'.$match[5].'" data-thumb-large="'.$videoDetail[0]['thumbnail_large'] .'" data-thumb-medium="'.$videoDetail[0]['thumbnail_medium'].'"></div>';
					// thumbnail for printing
					$replacement.= '<img class="visible-print" src="'.$videoDetail[0]['thumbnail_large'] .'" alt="Vimeo Video: '.$videoDetail[0]['title'].'">';
					// replace matching parts
					$this->content = preg_replace($pattern, $replacement, $this->content);
				}
			}
		}		
		
		// Dailymotion
		$matches = array();
		preg_match_all('#(<p>)?\s*<a href="http(s)?://(www\.)?dailymotion.com/(video/|embed/video/)?([a-zA-Z0-9-_]*)(?!/featured)(&.*|\?.*|/.*|_.*)?"(.*?)</a>\s*(</p>)?#', $this->content, $matches, PREG_SET_ORDER);
		if (isset($matches[0])) {
			foreach ($matches as $match) {
				// fetch Video Details from Dailymotion API:
				$videoDetail = json_decode(file_get_contents("https://api.dailymotion.com/video/".$match[5]));
				if (is_object($videoDetail)) {
					
					$videoThumbnails=json_decode(file_get_contents("https://api.dailymotion.com/video/".$videoDetail->id."?fields=thumbnail_large_url,thumbnail_url"));

					// search pattern
					$pattern='#(<p>)?\s*<a href="http(s)?://(www\.)?dailymotion.com/(video/|embed/video/)?'.$match[5].'(&.*|\?.*|/.*|_.*)?"(.*?)</a>\s*(</p>)?#';


					// iframe if thumbnail is disabled
					if ($disableThumbnail) $replacement = '<div class="vurpl-dailymotion embed-responsive embed-responsive-16by9 hidden-print"><iframe src="https://www.dailymotion.com/embed/video/'.$videoDetail->id.'?title=0&amp;byline=0&amp;portrait=0"></iframe></div>';
					else $replacement = '<div class="vurpl-dailymotion embed-responsive embed-responsive-16by9 hidden-print" id="'.$videoDetail->id.'" data-thumb-large="'.$videoThumbnails->thumbnail_url .'" data-thumb-medium="'.$videoThumbnails->thumbnail_large_url.'"></div>';
					// thumbnail for printing
					$replacement.= '<img class="visible-print" src="'.$videoThumbnails->thumbnail_url .'" alt="Dailymotion Video: '.$videoDetail->title.'">';
					// replace matching parts
					$this->content = preg_replace($pattern, $replacement, $this->content);
				}
			}
		}
		
	}
}


?>

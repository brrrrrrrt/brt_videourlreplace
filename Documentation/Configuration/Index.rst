.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

- include Static Template "Video URL Replace (brt_videourlreplace)" into your Root Template

- it is recommended to use your own YouTube API Key, it's free, get it here: https://developers.google.com/youtube/v3/getting-started

  plugin.brt_videourl_replace.googleApiKey = your_youtube_api_key

  **it cannot be guaranteed that the provided default key will always work, so you should really use your own!**

- the default list of stopwords is: */about,/intl/,/feed/,/channel/* you are able to change this via contants editor or by adding this to your contants:

  plugin.brt_videourl_replace.stopWords = /about,/intl/,/feed/,/channel/,/my-exclusion-example/

- disable the use of thumbnails via contants editor or by adding this to your contants:

  plugin.brt_videourl_replace.thumbnail.disable = 1

  (when thumbnails are disabled, URLs get replaced directly by iframes, no additional CSS or jQuery is used - in this case the static template inclusion in your root template will have no effect)

- define global "default" Parameters for the YouTube Player:

  plugin.brt_videourl_replace.globalYoutubeParams = showinfo=0&rel=0&controls=0&iv_load_policy=3
	
  See: https://developers.google.com/youtube/player_parameters
	
<<<<<<< HEAD
	**If the URL of the YouTube Video contains parameters, the global parameters will be ignored and the parameters from the video URL will be used instead.**
=======
  **If the URL of the YouTube Video contains parameters, the global parameters will be ignored and only the parameters added to the video URL will be used.**
>>>>>>> ab7c1d3a3dfed5b4636c3874ccd0bc5ddb869b0a

- make API Calls to Vimeo (serverside) non-SSL: 

  plugin.brt_videourl_replace.disableSSL = 1
	
	


.. _configuration-typoscript:

TypoScript Reference
--------------------

- Constants:

  plugin.brt_videourl_replace.googleApiKey = <default key is unrestriced but should not be used>
	
  plugin.brt_videourl_replace.thumbnail.disable = 0
	
  plugin.brt_videourl_replace.stopWords = /about,/intl/,/feed/,/channel/

  plugin.brt_videourl_replace.disableSSL = 0
	
	



- Setup:

  If you want to use your own JavaScript / CSS,
  add this to your page object:

  includeCSS.videoUrlReplace = path/to/your.css
	
  includeJSFooterlibs.videoUrlReplace = path/to/your.js




.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

- include Static Template "Video URL Replace (brt_videourlreplace)" into your Root Template

- it is recommended to use your own Youtube API Key, it's free, get it here: https://developers.google.com/youtube/v3/getting-started

	plugin.brt_videourl_replace.googleApiKey = your_youtube_api_key

	**it cannot be guaranteed that the provided default key will always work, so you should really use your own!**

- you can disable the use of thumbnails via contants editor or by adding this to your contants:

    plugin.brt_videourl_replace.thumbnail.disable = 1

	(when thumbnails are disabled, URLs get replaced directly by iframes, no additional CSS or jQuery is used - in this case the static template inclusion in your root template will have no effect)

- you can make API Calls to Vimeo (serverside) non-SSL by setting: 

	plugin.brt_videourl_replace.disableSSL = 1
	
	


.. _configuration-typoscript:

TypoScript Reference
--------------------

Constants:

	plugin.brt_videourl_replace.googleApiKey = <default key is unrestriced but should not be used>
	
	plugin.brt_videourl_replace.thumbnail.disable = 0

	plugin.brt_videourl_replace.disableSSL = 0
	



Setup:

If you want to use your own JavaScript / CSS,
add this to your page object:

	includeCSS.videoUrlReplace = path/to/your.css
	
	includeJSFooterlibs.videoUrlReplace = path/to/your.js




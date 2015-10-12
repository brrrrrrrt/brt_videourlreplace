.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

- include Static Template "Video URL Replace (brt_videourlreplace)" into your Root Template

- you can disable the use of thumbnails via contants editor or by adding this to your contants:

    plugin.brt_videourl_replace.thumbnail.disable = 1


(when thumbnails are disabled, URLs get replaced directly by iframes, no additional CSS or jQuery is used - in this case the static template inclusion in your root template will have no effect)




.. _configuration-typoscript:

TypoScript Reference
--------------------

Constants:

	plugin.brt_videourl_replace.thumbnail.disable = 1



Setup:

If you want to use your own JavaScript / CSS,
add this to your page object:

	includeCSS.videoUrlReplace = path/to/your.css
	
	includeJSFooterlibs.videoUrlReplace = path/to/your.js




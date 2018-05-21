.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _changelog:

ChangeLog
=========



=======  =========================================================================================================================
Version  Changes
=======  =========================================================================================================================
1.2.6	- [FEATURE] Youtube Player parameters (global, per video)

1.2.5	- [FEATURE] add list of stopwords configurable via typoscript constants

1.2.4	- [FEATURE] prefer curl for fetching meta data if available

1.2.3	- [FEATURE] add constant for Youtube API Key

1.2.2	- [TASK] TYPO3 CMS V9.0 compatibility, move addStaticFile to TCA Override

1.2.1	- [TASK] TYPO3 CMS V8.0 compatibility, more robust YT-thumbnail-URLs fetched from API

1.2.0	- [TASK] changed classnames to somthing less common:

	- .youtube -> .vurpl-youtube, .vimeo -> vurpl-vimeo, .dailymotion -> .vurpl-dailymotion


1.1.0	- [TASK] enhance channel/user detection using API for vimeo and dailymotion

1.0.9	- [BUGFIX] adopt regular expressions to ignore channels etc.

1.0.8   - [BUGFIX] TYPO3 V7.5 compatibility issue

1.0.7   - [FEATURE] via constants configurable option to disable thumbnails to just use plain responsive iframes

	- set V7.x compatibility

1.0.6   - [TASK] switch to youtube API v3 (used to fetch video title used in alt tag)

1.0.5   - [BUGFIX] add "-_" to the regex to support video ids containing slashes and underscores

1.0.4	- [BUGFIX] set the backgroundsize to cover instead of 100% to avoid 1px gap in some cases

1.0.3	- adjust dailymotion breakpoint for thumbnails

1.0.2 	- remove empty dependencies

1.0.1	- Add "Alt-tag" to print version image

1.0.0   - initial release



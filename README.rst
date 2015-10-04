Extension Manual
================

Requirements:
	- jQuery (if thumbnails are not deactivated via constants which is the default)
	- Bootstrap 3

This extension uses Bootstrap 3 classes for responsive video thumbnails and iframes.
The video thumbnails are replaced using jQuery selectors.

The thumbnail-feature can be disabled via constants editor. In this mode the Video URLs are directly replaced by the appropriate responsive iframe. jQuery is not used in this case and the JS code will not be included.

based on: `Faster Youtube embeds`_

**jQuery and Bootstrap is not included with this extension**

In order to make this extension work you will need those CSS and JavaScript libraries be included.

This can be achieved e.g. by installing the `bootstrap_package <http://typo3.org/extensions/repository/view/bootstrap_package>`_

`Demo`_


.. _Faster Youtube embeds: http://www.sitepoint.com/faster-youtube-embeds-javascript/
.. _Demo: http://effet.info/journal/video-url-replace/


.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

Target group: **Administrators**


.. _admin-installation:

Installation
------------


To install the extension, perform the following steps:

#. Go to the Extension Manager
#. Install the extension
#. Load the static template



.. _admin-configuration:

Configuration
-------------

* Currtently the extension has no configuration options.

.. _admin-faq:

FAQ
---

No video is shown: Make sure you have included the static template and jQuery (no Javascript Errors!).

The video Url is not replaced, instead the url is shown in the frontend: 
Usually Typo3 renders a http://... automatically as an anchor like <a href="http://..." . 
The extension replaces the whole anchor and also a sourrounding <p> if it has no classes. 
If the URL is not within such an anchor in the frontend, it does not get replaced!

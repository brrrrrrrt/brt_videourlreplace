.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _known-problems:

Known Problems
==============

- Video URLs without sourrounding <a>-tag are NOT replaced. 
  For the replacement to work the url must be rendered in frontend as <a href="http(s)://your.video.url...</a>. 
  Usually this happens automatically if you enter a plain URL to a Textfield.
- The videos are included using autoplay. It may be possible that youtube does not count embedded autoplay videos. Additionally some mobile devices do ignore autoplay settings, in such cases, users have to tab twice to make the video play, first to load the iframe, second to actually play the video.
- no Javascript, no videos.
`please report bugs, discuss, request features on github: <https://github.com/brrrrrrrt/brt_videourlreplace/issues>`_


<?php
defined('TYPO3_MODE') or die();

/*********************
 * Add static template
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	'brt_videourlreplace', 
	'Configuration/TypoScript', 
	'Video URL Replace'
);


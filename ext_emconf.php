<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "brt_videourlreplace"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Search & Replace Video URLs',
	'description' => 'video urls (Youtube, Vimeo, Dailymotion) will be replaced by videothumbnails and iframe when clicked',
	'category' => 'fe',
	'author' => 'Robert Breithuber',
	'author_email' => 'brt@effet.info',
	'author_company' => 'effet webservices',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.1.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-7.9.99',
		),
	),
);

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
	'uploadfolder' => false,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.2.6',
	'constraints' => array(
		'depends' => array(
			'php' => '5.4.0-7.2.99',
			'typo3' => '6.2.0-9.0.99'
		),
        'conflicts' => array(),
        'suggests' => array(),
	),
);

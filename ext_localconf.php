<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Classes/class.tx_brtvideourlreplace.php';

// hook is called before Caching / pages on their way in the cache:
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 'Brt\VideoUrlReplace\tx_brtvideourlreplace->replace';

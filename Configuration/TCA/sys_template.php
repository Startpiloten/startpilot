<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'startpilot',
    'Configuration/TypoScript',
    'Startpilot'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'startpilot',
    'Configuration/PageTS/pagetsconfig.typoscript',
    'Startpilot PageTSConfig'
);

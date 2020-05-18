<?php
defined('TYPO3_MODE') or die();

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'startpilot',
    'Configuration/TypoScript',
    'Startpilot'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'startpilot',
    'Configuration/TSconfig/TCEFORM.tsconfig',
    'Startpilot TCEFORM'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'startpilot',
    'Configuration/TSconfig/TCEMAIN.tsconfig',
    'Startpilot TCEMAIN'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'startpilot',
    'Configuration/TSconfig/mod/BackendLayouts.tsconfig',
    'Startpilot BackendLayouts'
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'startpilot',
    'Configuration/TSconfig/mod/newContentElement.tsconfig',
    'Startpilot newContentElement'
);

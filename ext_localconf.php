<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


if (TYPO3_MODE === 'BE') {

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'default-icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:startpilot/ext_icon.svg']
    );

    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/TSconfig">'
    );
}


/***************
 * Install Tool Settings
 */

$GLOBALS['TYPO3_CONF_VARS']['FE']['versionNumberInFilename'] = '';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = 'jpg,jpeg,tiff,png,pdf,svg';

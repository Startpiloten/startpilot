<?php

defined('TYPO3_MODE') || die();

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);
$iconRegistry->registerIcon(
    'default-icon',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:startpilot/ext_icon.svg']
);

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:startpilot/Configuration/Yaml/DefaultEditor.yaml';

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/UserTSConfig">'
);

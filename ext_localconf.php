<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);
$iconRegistry->registerIcon(
    'default-icon',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:startpilot/ext_icon.svg']
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/PageTS.ts">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/Backend_Layouts.ts">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/ContentElements.ts">'
);

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsRTE']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/BootstrapRTE.ts">');
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['hideAtCopy']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'TCEMAIN.table.tt_content.disableHideAtCopy = 1',
        'TCEMAIN.table.pages.disableHideAtCopy = 1'
    );
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disableCopyFlag']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'TCEMAIN.table.pages.disablePrependAtCopy = 1',
        'TCEMAIN.table.tt_content.disablePrependAtCopy = 1'
    );
}

// Disable default Content Elements

$temp_removeItems = [];

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_header']) {
    array_push($temp_removeItems, "header");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_text']) {
    array_push($temp_removeItems, "text");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_textpic']) {
    array_push($temp_removeItems, "textpic", "textmedia");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_bullets']) {
    array_push($temp_removeItems, "bullets");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_table']) {
    array_push($temp_removeItems, "table");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_uploads']) {
    array_push($temp_removeItems, "uploads");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu']) {
    array_push($temp_removeItems, "menu");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_html']) {
    array_push($temp_removeItems, "html");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_div']) {
    array_push($temp_removeItems, "div");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_shortcut']) {
    array_push($temp_removeItems, "shortcut");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_mailform']) {
    array_push($temp_removeItems, "mailform");
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_login']) {
    array_push($temp_removeItems, "login");
}

$temp_removeItems_list = implode(",", $temp_removeItems);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'TCEFORM.tt_content.CType.removeItems =' . $temp_removeItems_list
);


if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

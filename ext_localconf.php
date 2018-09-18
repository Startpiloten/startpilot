<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:' . $_EXTKEY . '/Configuration/UserTSConfig">'
);

if (TYPO3_MODE === 'BE') {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'default-icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:startpilot/ext_icon.svg']
    );

    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:startpilot/Configuration/Yaml/DefaultEditor.yaml';

    /***************
     * Extension Manager Settings
     */
    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
    }

    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['hideAtCopy']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'TCEMAIN.table.tt_content.disableHideAtCopy = 1',
            'TCEMAIN.table.pages.disableHideAtCopy = 1'
        );
    }

    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disableCopyFlag']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'TCEMAIN.table.pages.disablePrependAtCopy = 1',
            'TCEMAIN.table.tt_content.disablePrependAtCopy = 1'
        );
    }

    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_header']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(header)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_text']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(text)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_textpic']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(textpic)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_textmedia']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(textmedia)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_bullets']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(bullets)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_table']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(table)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_uploads']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(uploads)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_html']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(html)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_div']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(div)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_shortcut']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(shortcut)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_mailform']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(mailform)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_form']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(form_formframework)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_login']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(login)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_image']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(image)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_abstract']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_abstract)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_categorized_content']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_categorized_content)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_categorized_pages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_categorized_pages)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_pages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_pages)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_recently_updated']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_recently_updated)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_related_pages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_related_pages)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_section']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_section)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_section_pages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_section_pages)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_sitemap']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_sitemap)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_sitemap_pages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_sitemap_pages)');
    }
    if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu_subpages']) {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu_subpages)');
    }
    if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
        $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
    }
}

/***************
 * Install Tool Settings
 */

$GLOBALS['TYPO3_CONF_VARS']['FE']['versionNumberInFilename'] = '';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = 'jpg,jpeg,tiff,png,pdf,svg';

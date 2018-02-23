<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/*
 * Define general fields for tt_content
 * */
$global_fields = [];

ExtensionManagementUtility::addTCAcolumns('tt_content', $global_fields);

/*
 * Disable direct File Upload on Image Field
 * */
$GLOBALS['TCA']['tt_content']['columns']['image']['config']['appearance']['fileUploadAllowed'] = 0;

/*
 * Add 'imageposition' to search fields - so its included in the backend search results
 * */
$GLOBALS['TCA']['tt_content']['ctrl']['searchFields'] .= ',imageposition';

/*
 * Make bodytext searchable in all cTypes (Backend Search)
 * */
$GLOBALS['TCA']['tt_content']['columns']['bodytext']['config']['search'] = [
    'pidonly' => 0,
    'case' => 0,
];

/*
 * Create custom category for own cTypes
 * */
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Custom Content Elements',
        '--div--'
    ],
    '--div--',
    'before'
);

/*
 * This variables are used to create the defaults in custom ctypes. (tt_content_textimage.php L:74:23)
 * */
$showitem_default_01 = '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                        ';
$showitem_default_02 = '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                            --palette--;;language,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                            --palette--;;hidden,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                            categories,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                            rowDescription,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                        ';

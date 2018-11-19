<?php

/*
 * Define general fields for tt_content
 * */
$global_fields = [];

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $global_fields);

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
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Custom Content Elements',
        '--div--'
    ],
    '--div--',
    'before'
);

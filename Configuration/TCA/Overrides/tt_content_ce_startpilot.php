<?php
/**
 * Startpilot Content Element | ce_startpilot
 */

/***************
 * Register fields
 */
$ce_startpilot_fields = array();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $ce_startpilot_fields);

/***************
 * Add Content Element: ce_startpilot
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['ce_startpilot'])) {
    $GLOBALS['TCA']['tt_content']['types']['ce_startpilot'] = [];
}

/***************
 * Add content element to seletor list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Startpilot Content Element',
        'ce_startpilot',
        'EXT:startpilot/ext_icon.png'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ce_startpilot'] = 'startpilot-icon';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['ce_startpilot'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['ce_startpilot'],
    [
        'showitem' => '
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
        image,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
            hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
        --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories
        '
    ]
);

<?php
/**
 * Startpilot Content Element | ce_startpilot
 */

/***************
 * Register fields
 */
$ce_startpilot_fields = array(
    'imageposition' => array(
        'exclude' => 0,
        'label' => 'Image Orientation',
        'config' => array(
            'type' => 'select',
            'items' => array(
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_startpilot_dropdown_option1.title', 'top'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_startpilot_dropdown_option2.title', 'bottom'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_startpilot_dropdown_option3.title', 'right'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_startpilot_dropdown_option4.title', 'left'),
            )
        ),
    ),
);

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
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
        imageposition,
        image,
        bodytext,
              
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
            hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
        --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories
        ',
        'columnsOverrides' => [
            'bodytext' => ['defaultExtras' => 'richtext:rte_transform[mode=ts_css]'],
            'image' => array(
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    array(
                        'collapseAll' => 1,
                        'maxitems' => 1,
                    )
                ),
            ),
        ]
    ]
);

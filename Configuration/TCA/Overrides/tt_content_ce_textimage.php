<?php
/**
 * Startpilot Content Element | ce_textimage
 */

/***************
 * Register fields
 */
$ce_textimage_fields = array(
    'imageposition' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_textimage_dropdown.title',
        'config' => array(
            'type' => 'select',
            'items' => array(
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_textimage_dropdown.option1', 'top'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_textimage_dropdown.option2', 'bottom'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_textimage_dropdown.option3', 'right'),
                array('LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:ce_textimage_dropdown.option4', 'left'),
            )
        ),
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $ce_textimage_fields);

/***************
 * Add Content Element: ce_textimage
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['ce_textimage'])) {
    $GLOBALS['TCA']['tt_content']['types']['ce_textimage'] = [];
}

/***************
 * Add content element to seletor list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Text with Image',
        'ce_textimage',
        'EXT:startpilot/ext_icon.png'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ce_textimage'] = 'default-icon';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['ce_textimage'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['ce_textimage'],
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


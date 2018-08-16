<?php
/**
 * Startpilot Content Element | startpilot_textimage
 */

/***************
 * Register fields
 */
$startpilot_textimage_fields = [
    'imageposition' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:startpilot_textimage_dropdown.title',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:startpilot_textimage_dropdown.option1',
                    'top'
                ],
                [
                    'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:startpilot_textimage_dropdown.option2',
                    'bottom'
                ],
                [
                    'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:startpilot_textimage_dropdown.option3',
                    'right'
                ],
                [
                    'LLL:EXT:startpilot/Resources/Private/Language/locallang.xlf:startpilot_textimage_dropdown.option4',
                    'left'
                ],
            ]
        ],
    ],
];

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $startpilot_textimage_fields);

/***************
 * Add Content Element: startpilot_textimage
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['startpilot_textimage'])) {
    $GLOBALS['TCA']['tt_content']['types']['startpilot_textimage'] = [];
}

/***************
 * Add content element to seletor list
 */
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Text with Image',
        'startpilot_textimage',
        'EXT:startpilot/ext_icon.png'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['startpilot_textimage'] = 'default-icon';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['startpilot_textimage'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['startpilot_textimage'],
    [
        'showitem' => $showitem_default_01 . '
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
        imageposition,
        image,
        bodytext,
        ' . $showitem_default_02,
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => true,
                    'richtextConfiguration' => 'default'
                ]
            ],
            'image' => [
                'config' => TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'collapseAll' => 1,
                        'maxitems' => 1,
                    ]
                ),
            ],
        ]
    ]
);

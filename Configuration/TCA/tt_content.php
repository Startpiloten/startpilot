<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$GLOBALS['TCA']['tt_content']['ctrl']['searchFields'] .= ',imageposition';

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

$global_fields = [];

ExtensionManagementUtility::addTCAcolumns('tt_content', $global_fields);

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

$GLOBALS['TCA']['sys_file_reference']['columns']['crop']['config']['cropVariants'] = [
    'default' => [
        'title' => 'Desktop',
        'allowedAspectRatios' => [
            'NaN' => [
                'title' => 'Free',
                'value' => 0.0
            ],
            '3:2' => [
                'title' => '3:2',
                'value' => 3 / 2
            ],
            '1:1' => [
                'title' => '1:1',
                'value' => 1 / 1
            ],
            'person' => [
                'title' => 'Portrait',
                'value' => 0.6666
            ],
        ],
        'selectedRatio' => 'NaN',
    ],
    'tablet' => [
        'title' => 'Tablet',
        'allowedAspectRatios' => [
            'NaN' => [
                'title' => 'Free',
                'value' => 0.0
            ],
            '3:2' => [
                'title' => '3:2',
                'value' => 3 / 2
            ],
            '1:1' => [
                'title' => '1:1',
                'value' => 1 / 1
            ],
            'person' => [
                'title' => 'Portrait',
                'value' => 0.6666
            ],
        ],
        'selectedRatio' => 'NaN',
    ],
    'mobile' => [
        'title' => 'Mobile',
        'allowedAspectRatios' => [
            'NaN' => [
                'title' => 'Free',
                'value' => 0.0
            ],
            '3:2' => [
                'title' => '3:2',
                'value' => 3 / 2
            ],
            '1:1' => [
                'title' => '1:1',
                'value' => 1 / 1
            ],
            'person' => [
                'title' => 'Portrait',
                'value' => 0.6666
            ],
        ],
        'selectedRatio' => 'NaN',
    ],
];

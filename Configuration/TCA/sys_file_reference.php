<?php

/*
 * Set default image croppings
 * */
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

/*
 * Example how to override crop for a single cType
 * */

/*
 *
 * $GLOBALS['TCA']['tt_content']['types']['myCtype']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config'] = [
 *     'cropVariants' => [
 *         'default' => [
 *             'disabled' => true,
 *         ],
 *         'tablet' => [
 *             'disabled' => true,
 *         ],
 *         'mobile' => [
 *             'disabled' => true,
 *         ],
 *         'detailview' => [
 *             'title' => 'Detail View Image',
 *             'allowedAspectRatios' => [
 *                 '3:2' => [
 *                     'title' => 'News Detail View 3:2',
 *                     'value' => 3 / 2
 *                 ]
 *             ],
 *             'selectedRatio' => '3:2',
 *         ],
 *         'slider' => [
 *             'title' => 'Big Slider Image',
 *             'allowedAspectRatios' => [
 *                 '1920:715' => [
 *                     'title' => 'Slider Image 1920:715',
 *                     'value' => 1920 / 715
 *                 ]
 *             ],
 *             'selectedRatio' => '1920:715',
 *         ],
 *         'boxslider' => [
 *             'title' => 'Box Slider Image',
 *             'allowedAspectRatios' => [
 *                 '1:1' => [
 *                     'title' => 'Box Slider Image 1:1',
 *                     'value' => 1 / 1
 *                 ]
 *             ],
 *             'selectedRatio' => '1:1',
 *         ],
 *     ],
 * ];
 *
 */

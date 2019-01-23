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
            ]
        ],
        'selectedRatio' => 'NaN',
    ],
];

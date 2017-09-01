<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'TYPO3 Provider Extension',
    'description' => '',
    'category' => 'templates',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'author' => 'Medienagent',
    'author_email' => 'name@medienagenten.de',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.9-8.99.99'
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);

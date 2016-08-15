<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Typo3 Provider Extension',
    'description' => '',
    'category' => 'templates',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'author' => 'Boris Schauer',
    'author_email' => 'me@bschauer.de',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.12-7.99.99'
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);

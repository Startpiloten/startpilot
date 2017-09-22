<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'TYPO3 Provider Extension',
    'description' => '',
    'category' => 'templates',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'author' => 'Boris Schauer, Analog, Medienagenten',
    'author_email' => 'me@bschauer.de, info@analog.de, info@medienagenten.de',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.*'
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);

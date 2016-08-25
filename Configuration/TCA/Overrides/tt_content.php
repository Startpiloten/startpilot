<?php
/**
 * Created by PhpStorm.
 * User: bschauer
 * Date: 23.08.16
 * Time: 12:59
 */

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Custom Content Elements',
        '--div--'
    ],
    '--div--',
    'before'
);

$global_fields = array(

);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $global_fields);

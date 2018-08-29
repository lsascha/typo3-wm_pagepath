<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function() {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Webmatch.WmPagepath',
            'Pagepath',
            [
                'Pagepath' => 'link'
            ],
            // non-cacheable actions
            [
                'Pagepath' => 'link'
            ]
        );
    }
);

<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CM.parser',
            'Psone',
            'Pserser One'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('parser', 'Configuration/TypoScript', 'My Parser');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_parser_domain_model_parser', 'EXT:parser/Resources/Private/Language/locallang_csh_tx_parser_domain_model_parser.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_parser_domain_model_parser');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_parser_domain_model_response', 'EXT:parser/Resources/Private/Language/locallang_csh_tx_parser_domain_model_response.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_parser_domain_model_response');

    }
);

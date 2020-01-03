<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CM.Parser',
            'Psone',
            [
                'Parser' => 'list, show',
                'Response' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Parser' => '',
                'Response' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    psone {
                        iconIdentifier = parser-plugin-psone
                        title = LLL:EXT:parser/Resources/Private/Language/locallang_db.xlf:tx_parser_psone.name
                        description = LLL:EXT:parser/Resources/Private/Language/locallang_db.xlf:tx_parser_psone.description
                        tt_content_defValues {
                            CType = list
                            list_type = parser_psone
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'parser-plugin-psone',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:parser/Resources/Public/Icons/user_plugin_psone.svg']
			);
		
    }
);

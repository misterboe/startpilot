<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Define TypoScript as content rendering template
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'amtemplate/Configuration/TypoScript/';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/PageTS.t3s">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/Backend_Layouts.t3s">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'
    . $_EXTKEY . '/Configuration/PageTS/ContentElements.t3s">'
);

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disablePageTsRTE']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/BootstrapRTE.t3s">');
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['hideAtCopy']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'TCEMAIN.table.tt_content.disableHideAtCopy = 1',
        'TCEMAIN.table.pages.disableHideAtCopy = 1'
    );
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disableCopyFlag']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'TCEMAIN.table.pages.disablePrependAtCopy = 1',
        'TCEMAIN.table.tt_content.disablePrependAtCopy = 1'
    );
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_header']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(header)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_text']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(text)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_textpic']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(textpic,textmedia)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_bullets']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(bullets)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_table']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(table)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_uploads']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(uploads)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_menu']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(menu)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_html']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(html)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_div']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(div)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_shortcut']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(shortcut)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_mailform']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(mailform)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_login']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(login)');
}
if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['disable_image']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(image)');
}

if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

/***************
 * Set alias for menu processor as fallback if the core menu
 * processor does not exist for TYPO3 Versions below 8.5
 */
if (!class_exists('TYPO3\CMS\Frontend\DataProcessing\MenuProcessor')) {
    class_alias(
        \Vendor\Yourext\DataProcessing\MenuProcessor::class,
        'TYPO3\CMS\Frontend\DataProcessing\MenuProcessor'
    );
}

/***************
 * Install Tool Settings
 */

$GLOBALS['TYPO3_CONF_VARS']['BE']['versionNumberInFilename'] = 'true';
$GLOBALS['TYPO3_CONF_VARS']['FE']['versionNumberInFilename'] = 'embed';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] = 'jpg,jpeg,tiff,png,pdf,svg';
// $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = 'false';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '';

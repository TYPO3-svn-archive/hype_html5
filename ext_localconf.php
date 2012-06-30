<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# HOOKS

# Frontend
if(TYPO3_MODE == 'FE') {

	# TSLib Frontend
	$GLOBALS['TYPO3_CONF_VARS']['FE']['XCLASS']['tslib/class.tslib_fe.php'] = t3lib_extMgm::extPath('hype_html5', 'Classes/XClass/class.ux_tslib_fe.php');
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['configArrayPostProc'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_tslib_fe.php:user_hypehtml5_tslib_fe->configArrayPostProc';

	# Page Renderer
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-postProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPostProcess';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPreProcess';

	# HTML Parser
	$GLOBALS['TYPO3_CONF_VARS']['FE']['XCLASS']['t3lib/class.t3lib_parsehtml.php'] = t3lib_extMgm::extPath('hype_html5', 'Classes/XClass/class.ux_t3lib_parsehtml.php');

	# CSS Styled Content
	$GLOBALS['TYPO3_CONF_VARS']['FE']['XCLASS']['ext/css_styled_content/pi1/class.tx_cssstyledcontent_pi1.php'] = t3lib_extMgm::extPath('hype_html5', 'Classes/XClass/class.ux_tx_cssstyledcontent_pi1.php');
}

# Content Rendering
if(is_array($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'])) {
	array_push($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'], 'hypehtml5/Configuration/TypoScript/4.7/');
	array_push($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'], 'hypehtml5/Configuration/TypoScript/4.6/');
	array_push($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'], 'hypehtml5/Configuration/TypoScript/4.5/');
} else {
	$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'] = array(
		'hypehtml5/Configuration/TypoScript/4.7/',
		'hypehtml5/Configuration/TypoScript/4.6/',
		'hypehtml5/Configuration/TypoScript/4.5/'
	);
}

?>
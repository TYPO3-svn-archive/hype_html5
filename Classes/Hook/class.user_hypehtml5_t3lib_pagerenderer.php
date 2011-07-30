<?php

class user_hypehtml5_t3lib_pagerenderer {

	/**
	 * Adds modernizr HTML5 support for browsers
	 */
	public function renderPreProcess($parameters, $renderer) {

		if(!$parameters['jsLibs']['modernizr']) {
			$parameters['jsLibs']['modernizr'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/modernizr.js',
				'type' => 'text/javascript',
				'section' => 1,
				'compress' => FALSE,
				'forceOnTop' => TRUE
			);
		}
	}

	/**
	 * Adds the html5boilerplate html tag
	 */
	public function renderPostProcess($parameters, $renderer) {

		# get language token
		$languageToken = ($language = $renderer->getLanguage())
			? $language
			: 'en';

		# fix <html> opening tag
		$parameters['htmlTag'] = '<!--[if lt IE 7]><html class="no-js ie6" lang="' . $languageToken . '"><![endif]-->
<!--[if IE 7]>   <html class="no-js ie7" lang="' . $languageToken . '"><![endif]-->
<!--[if IE 8]>   <html class="no-js ie8" lang="' . $languageToken . '"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="' . $languageToken . '"><!--<![endif]-->';

		# fix style tags
		$parameters['cssFiles'] = str_replace(array(' type="text/css"', ' media="all"'), '', $parameters['cssFiles']);

		# fix script tags
		$parameters['jsLibs'] = str_replace(' type="text/javascript"', '', $parameters['jsLibs']);
		$parameters['jsFiles'] = str_replace(' type="text/javascript"', '', $parameters['jsFiles']);
		$parameters['jsFooterFiles'] = str_replace(' type="text/javascript"', '', $parameters['jsFooterFiles']);

		# fix custom data
		$parameters['headerData'] = str_replace(array(' type="text/javascript"', ' type="text/css"', ' media="all"'), '', $parameters['headerData']);
		$parameters['footerData'] = str_replace(array(' type="text/javascript"', ' type="text/css"', ' media="all"'), '', $parameters['footerData']);
	}
}

?>
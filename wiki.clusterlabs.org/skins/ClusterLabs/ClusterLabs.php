<?php

/**
 * ClusterLabs nouveau
 *
 * Translated from gwicke's previous TAL template version to remove
 * dependency on PHPTAL.
 *
 * @file
 * @ingroup Skins
 */

if ( function_exists( 'wfLoadSkin' ) ) {
	wfLoadSkin( 'ClusterLabs' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['ClusterLabs'] = __DIR__ . '/i18n';
	/* wfWarn(
		'Deprecated PHP entry point used for ClusterLabs skin. Please use wfLoadSkin instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return true;
} else {
	die( 'This version of the ClusterLabs skin requires MediaWiki 1.25+' );
}

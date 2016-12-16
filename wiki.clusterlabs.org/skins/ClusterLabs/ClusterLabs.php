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

// Register files
$wgAutoloadClasses['SkinClusterLabs'] = __DIR__ . '/SkinClusterLabs.php';
$wgAutoloadClasses['ClusterLabsTemplate'] = __DIR__ . '/ClusterLabsTemplate.php';
$wgMessagesDirs['ClusterLabs'] = __DIR__ . '/i18n';

// Register skin
$wgValidSkinNames['clusterlabs'] = 'ClusterLabs';

// Register modules
$wgResourceModules['skins.clusterlabs.styles'] = array(
	'styles' => array(
		'main.css' => array( 'media' => 'screen' ),
	),
	'remoteSkinPath' => 'ClusterLabs',
	'localBasePath' => __DIR__,
);

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

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @ingroup Skins
 */
class SkinClusterLabs extends SkinTemplate {
	/** Using ClusterLabs. */
	public $skinname = 'clusterlabs';
	public $stylename = 'ClusterLabs';
	public $template = 'ClusterLabsTemplate';

	function setupSkinUserCss( OutputPage $out ) {
		global $wgHandheldStyle;

		parent::setupSkinUserCss( $out );

		$out->addModuleStyles( array( 'mediawiki.skinning.interface', 'skins.clusterlabs.styles' ) );

		// Append to the default screen common & print styles...
		$out->addStyle( $this->stylename . '/main.css', 'screen' );
		if( $wgHandheldStyle ) {
			// Currently in testing... try 'chick/main.css'
			$out->addStyle( $wgHandheldStyle, 'handheld' );
		}

		$out->addStyle( $this->stylename . '/IE60Fixes.css', 'screen', 'IE 6' );
		$out->addStyle( $this->stylename . '/IE70Fixes.css', 'screen', 'IE 7' );

		$out->addStyle( $this->stylename . '/rtl.css', 'screen', '', 'rtl' );
	}
}

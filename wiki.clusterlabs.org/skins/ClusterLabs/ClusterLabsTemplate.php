<?php
/**
 * ClusterLabs skin
 *
 * based on:
 */
/**
 * MonoBook nouveau.
 *
 * Translated from gwicke's previous TAL template version to remove
 * dependency on PHPTAL.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

/**
 * @ingroup Skins
 */
class ClusterLabsTemplate extends BaseTemplate {
	var $skin;
	/**
	 * Template filter callback for ClusterLabs skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		global $wgRequest;
		$this->skin = $skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

		$this->html( 'headelement' );
		?><div id="globalWrapper">
		<div id="column-content">
			<div id="content" class="mw-body" role="main">
				<a id="top"></a>
				<?php
				if ( $this->data['sitenotice'] ) {
					?>
					<div id="siteNotice"><?php
					$this->html( 'sitenotice' )
					?></div><?php
				}
				?>

				<?php
				echo $this->getIndicators();
				// Loose comparison with '!=' is intentional, to catch null and false too, but not '0'
				if ( $this->data['title'] != '' ) {
				?>
				<h1 id="firstHeading" class="firstHeading" lang="<?php
				$this->data['pageLanguage'] =
					$this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
				$this->text( 'pageLanguage' );
				?>"><?php $this->html( 'title' ) ?></h1>
				<?php } ?>

				<div id="bodyContent" class="mw-body-content">
					<div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>
					<div id="contentSub"<?php
					$this->html( 'userlangattributes' ) ?>><?php $this->html( 'subtitle' )
						?></div>
					<?php if ( $this->data['undelete'] ) { ?>
						<div id="contentSub2"><?php $this->html( 'undelete' ) ?></div>
					<?php
}
					?><?php
					if ( $this->data['newtalk'] ) {
						?>
						<div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
					<?php
					}
					?>
					<div id="jump-to-nav" class="mw-jump"><?php
						$this->msg( 'jumpto' )
						?> <a href="#column-one"><?php
							$this->msg( 'jumptonavigation' )
							?></a><?php
						$this->msg( 'comma-separator' )
						?><a href="#searchInput"><?php
							$this->msg( 'jumptosearch' )
							?></a></div>

					<!-- start content -->
					<?php $this->html( 'bodytext' ) ?>
					<?php
					if ( $this->data['catlinks'] ) {
						$this->html( 'catlinks' );
					}
					?>
					<!-- end content -->
					<?php
					if ( $this->data['dataAfterContent'] ) {
						$this->html( 'dataAfterContent'
						);
					}
					?>
					<div class="visualClear"></div>
				</div>
			</div>
		</div>
		<div id="column-one">
	<div id="p-cactions" class="portlet">
		<h5><?php $this->msg('views') ?></h5>
		<div class="pBody">
			<ul>
	<?php		foreach($this->data['content_actions'] as $key => $tab) {
					echo '
				 <li id="' . Sanitizer::escapeId( "ca-$key" ) . '"';
					if( $tab['class'] ) {
						echo ' class="'.htmlspecialchars($tab['class']).'"';
					}
					echo'><a href="'.htmlspecialchars($tab['href']).'"';
					# We don't want to give the watch tab an accesskey if the
					# page is being edited, because that conflicts with the
					# accesskey on the watch checkbox.  We also don't want to
					# give the edit tab an accesskey, because that's fairly su-
					# perfluous and conflicts with an accesskey (Ctrl-E) often
					# used for editing in Safari.
				 	if( in_array( $action, array( 'edit', 'submit' ) )
				 	&& in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
				 		echo $skin->tooltip( "ca-$key" );
				 	} else {
				 		echo $skin->tooltipAndAccesskeyAttribs( "ca-$key" );
				 	}
				 	echo '>'.htmlspecialchars($tab['text']).'</a></li>';
				} ?>
			</ul>
		</div>
	</div>
	<div class="portlet" id="p-personal">
		<h5><?php $this->msg('personaltools') ?></h5>
		<div class="pBody">
			<ul>
<?php 			foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li id="<?php echo Sanitizer::escapeId( "pt-$key" ) ?>"<?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
				echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskeyAttribs('pt-'.$key) ?><?php
				if(!empty($item['class'])) { ?> class="<?php
				echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
				echo htmlspecialchars($item['text']) ?></a></li>
<?php			} ?>
			</ul>
		</div>
	</div>
	<div class="portlet" id="p-logo">
		<a style="background-image: url(<?php $this->text('logopath') ?>);" <?php
			?>href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"<?php
			echo $skin->tooltipAndAccesskeyAttribs('p-logo') ?>></a>
	</div>
	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
<?php
		$sidebar = $this->data['sidebar'];
		if ( !isset( $sidebar['SEARCH'] ) ) $sidebar['SEARCH'] = true;
		if ( !isset( $sidebar['TOOLBOX'] ) ) $sidebar['TOOLBOX'] = true;
		if ( !isset( $sidebar['LANGUAGES'] ) ) $sidebar['LANGUAGES'] = true;
		foreach ($sidebar as $boxName => $cont) {
			if ( $boxName == 'SEARCH' ) {
				$this->searchBox();
			} elseif ( $boxName == 'TOOLBOX' ) {
				$this->toolbox();
			} elseif ( $boxName == 'LANGUAGES' ) {
				$this->languageBox();
			} else {
				$this->customBox( $boxName, $cont );
			}
		}
?>
		</div><!-- end of the left (by default at least) column -->
		<div class="visualClear"></div>
		<?php
		$validFooterIcons = $this->getFooterIcons( "icononly" );
		$validFooterLinks = $this->getFooterLinks( "flat" ); // Additional footer links

		if ( count( $validFooterIcons ) + count( $validFooterLinks ) > 0 ) {
			?>
			<div id="footer" role="contentinfo"<?php $this->html( 'userlangattributes' ) ?>>
			<?php
			$footerEnd = '</div>';
		} else {
			$footerEnd = '';
		}

		foreach ( $validFooterIcons as $blockName => $footerIcons ) {
			?>
			<div id="f-<?php echo htmlspecialchars( $blockName ); ?>ico">
				<?php foreach ( $footerIcons as $icon ) { ?>
					<?php echo $this->getSkin()->makeFooterIcon( $icon ); ?>

				<?php
}
				?>
			</div>
		<?php
		}

		if ( count( $validFooterLinks ) > 0 ) {
			?>
			<ul id="f-list">
				<?php
				foreach ( $validFooterLinks as $aLink ) {
					?>
					<li id="<?php echo $aLink ?>"><?php $this->html( $aLink ) ?></li>
				<?php
				}
				?>
			</ul>
		<?php
		}

		echo $footerEnd;
		?>

		</div>
		<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
		echo "\n";
		wfRestoreWarnings();
	} // end of execute() method

	/*************************************************************************************************/
	function searchBox() {
		global $wgUseTwoButtonsSearchForm;
?>
	<div id="p-search" class="portlet">
		<h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
		<div id="searchBody" class="pBody">
			<form action="<?php $this->text('wgScript') ?>" id="searchform"><div>
				<input type='hidden' name="title" value="<?php $this->text('searchtitle') ?>"/>
				<input id="searchInput" name="search" type="text"<?php echo $this->skin->tooltipAndAccesskeyAttribs('search');
					if( isset( $this->data['search'] ) ) {
						?> value="<?php $this->text('search') ?>"<?php } ?> />
				<input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs( 'search-go' ); ?> /><?php if ($wgUseTwoButtonsSearchForm) { ?>&nbsp;
				<input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs( 'search-fulltext' ); ?> /><?php } else { ?>

				<div><a href="<?php $this->text('searchaction') ?>" rel="search"><?php $this->msg('powersearch-legend') ?></a></div><?php } ?>

			</div></form>
		</div>
	</div>
<?php
	}

	/*************************************************************************************************/
	function toolbox() {
?>
	<div class="portlet" id="p-tb">
		<h5><?php $this->msg('toolbox') ?></h5>
		<div class="pBody">
			<ul>
<?php
		if($this->data['notspecialpage']) { ?>
				<li id="t-whatlinkshere"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-whatlinkshere') ?>><?php $this->msg('whatlinkshere') ?></a></li>
<?php
			if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
				<li id="t-recentchangeslinked"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-recentchangeslinked') ?>><?php $this->msg('recentchangeslinked') ?></a></li>
<?php 		}
		}
		if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
			<li id="t-trackbacklink"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-trackbacklink') ?>><?php $this->msg('trackbacklink') ?></a></li>
<?php 	}
		if($this->data['feeds']) { ?>
			<li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
					?><a id="<?php echo Sanitizer::escapeId( "feed-$key" ) ?>" href="<?php
					echo htmlspecialchars($feed['href']) ?>" rel="alternate" type="application/<?php echo $key ?>+xml" class="feedlink"<?php echo $this->skin->tooltipAndAccesskeyAttribs('feed-'.$key) ?>><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;
					<?php } ?></li><?php
		}

		foreach( array('contributions', 'log', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {

			if($this->data['nav_urls'][$special]) {
				?><li id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-'.$special) ?>><?php $this->msg($special) ?></a></li>
<?php		}
		}

		if(!empty($this->data['nav_urls']['print']['href'])) { ?>
				<li id="t-print"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['print']['href'])
				?>" rel="alternate"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-print') ?>><?php $this->msg('printableversion') ?></a></li><?php
		}

		if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
				<li id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs('t-permalink') ?>><?php $this->msg('permalink') ?></a></li><?php
		} elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
				<li id="t-ispermalink"<?php echo $this->skin->tooltip('t-ispermalink') ?>><?php $this->msg('permalink') ?></li><?php
		}

		wfRunHooks( 'ClusterLabsTemplateToolboxEnd', array( &$this ) );
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
			</ul>
		</div>
	</div>
<?php
	}

	/*************************************************************************************************/
	function languageBox() {
		if( $this->data['language_urls'] ) {
?>
	<div id="p-lang" class="portlet">
		<h5><?php $this->msg('otherlanguages') ?></h5>
		<div class="pBody">
			<ul>
<?php		foreach($this->data['language_urls'] as $langlink) { ?>
				<li class="<?php echo htmlspecialchars($langlink['class'])?>"><?php
				?><a href="<?php echo htmlspecialchars($langlink['href']) ?>"><?php echo $langlink['text'] ?></a></li>
<?php		} ?>
			</ul>
		</div>
	</div>
<?php
		}
	}

	/*************************************************************************************************/
	function customBox( $bar, $cont ) {
?>
	<div class='generated-sidebar portlet' id='<?php echo Sanitizer::escapeId( "p-$bar" ) ?>'<?php echo $this->skin->tooltip('p-'.$bar) ?>>
		<h5><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></h5>
		<div class='pBody'>
<?php   if ( is_array( $cont ) ) { ?>
			<ul>
<?php 			foreach($cont as $key => $val) { ?>
				<li id="<?php echo Sanitizer::escapeId($val['id']) ?>"<?php
					if ( $val['active'] ) { ?> class="active" <?php }
				?>><a href="<?php echo htmlspecialchars($val['href']) ?>"<?php echo $this->skin->tooltipAndAccesskeyAttribs($val['id']) ?>><?php echo htmlspecialchars($val['text']) ?></a></li>
<?php			} ?>
			</ul>
<?php   } else {
			# allow raw HTML block to be defined by extensions
			print $cont;
		}
?>
		</div>
	</div>
<?php
	}

} // end of class ClusterLabsTemplate

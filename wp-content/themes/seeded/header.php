<?php
/*
 WARNING: This file is part of the core Genesis framework. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Handles the header structure.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Templates
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );

wp_head(); /** we need this for plugins **/
?>
</head>
<body <?php body_class(); ?>>
<div id="logo_banner"><a href="/"><img class="clearfix" id="logo" src="/wp-content/themes/seeded/images/seeded_at_the_table_logo.png" /></a>
	<div id="top_banner" class="clearfix">
<?php if ( ! dynamic_sidebar( 'Top Banner Ad' ) ) :?><?php endif;?>
</div></div>
<?php
do_action( 'genesis_before' );
?>
<div id="wrap">
	<!-- AddThis Button BEGIN -->
<div id="seeded_share">
	<p>SHARE THIS POST</p>
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<div class="custom_images">
<a class="addthis_button_pinterest_share"><img src="/wp-content/themes/seeded/images/share_pinterest.png" width="32" height="32" border="0" alt="Pin It" /></a>
<a class="addthis_button_stumbleupon"><img src="/wp-content/themes/seeded/images/share_stumbleupon.png" width="32" height="32" border="0" alt="Stumble This" /></a>
<a class="addthis_button_twitter"><img src="/wp-content/themes/seeded/images/share_twitter.png" width="32" height="32" border="0" alt="Tweet This Post" /></a>
<a class="addthis_button_facebook"><img src="/wp-content/themes/seeded/images/share_facebook.png" width="32" height="32" border="0" alt="Share to Facebook" /></a>
<a class="addthis_button_rss"><img src="/wp-content/themes/seeded/images/share_rss.png" width="32" height="32" border="0" alt="Share to Facebook" /></a>

</div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50df80d764a33d88"></script>
</div>
<!-- AddThis Button END -->

<?php
do_action( 'genesis_before_header' );
do_action( 'genesis_header' );
do_action( 'genesis_after_header' );

echo '<div id="inner">';
genesis_structural_wrap( 'inner' );

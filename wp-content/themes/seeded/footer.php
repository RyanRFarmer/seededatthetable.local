<?php
/**
 * Handles the footer structure.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Templates
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

genesis_structural_wrap( 'inner', '</div><!-- end .wrap -->' );
echo '</div><!-- end #inner -->';

do_action( 'genesis_before_footer' );
do_action( 'genesis_footer' );
do_action( 'genesis_after_footer' );
?>
</div><!-- end #wrap -->
<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>

<script type="text/javascript" src="/wp-content/themes/seeded/scripts/seeded.js"></script>

</body>
</html>

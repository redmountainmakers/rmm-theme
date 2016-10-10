<?php
//
// Recommended way to include parent theme styles.
// (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'parent-style' )
    );
}

//
// Your code goes below
//

// Define this function so that GeneratePress doesn't do it for us
function generate_add_footer_info() {
?>
	<span class="copyright">
		<?php esc_html_e( 'Copyright', 'rmm' ); ?>
		&copy;
		2012 &ndash; <?php echo date('Y'); ?>
		<?php esc_html_e( 'Red Mountain Makers', 'rmm' ); ?>
	</span>
	&#x000B7;
<?php printf(
	esc_html__( 'Proudly powered by %s and %s', 'rmm' ),
	'<a href="https://wordpress.org/">WordPress</a>',
	'<a href="https://generatepress.com/">GeneratePress</a>'
);
}

// Show a custom footer using GeneratePress hooks
add_action( 'generate_credits', 'generate_add_footer_info' );

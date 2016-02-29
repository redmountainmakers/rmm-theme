<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @uses rmmtheme_header_style()
 * @uses rmmtheme_admin_header_style()
 * @uses rmmtheme_admin_header_image()
 *
 * @package rmmtheme
 */
function rmmtheme_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => 'FFF',
		'width'                  => 960,
		'height'                 => 150,
		'flex-height'            => true,
		'wp-head-callback'       => 'rmmtheme_header_style',
		'admin-head-callback'    => 'rmmtheme_admin_header_style',
		'admin-preview-callback' => 'rmmtheme_admin_header_image',
	);

	$args = apply_filters( 'rmmtheme_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'rmmtheme_custom_header_setup' );

if ( ! function_exists( 'rmmtheme_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see rmmtheme_custom_header_setup().
 *
 * @since rmmtheme 1.0
 */
function rmmtheme_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() && '' == get_header_image() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Do we have a custom header image?
		if ( '' != get_header_image() ) :
	?>
		.site-header img {
			display: block;
			margin: 0.5em auto 0;
		}
	<?php endif;

		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		.site-header hgroup {
			background: none;
			padding: 0;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // rmmtheme_header_style

if ( ! function_exists( 'rmmtheme_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see rmmtheme_custom_header_setup().
 *
 * @since rmmtheme 1.0
 */
function rmmtheme_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		background: #000;
		border: none;
		min-height: 200px;
	}
	#headimg h1 {
		font-size: 30px;
		font-family: Georgia, 'Times New Roman', serif;
		font-style: italic;
		font-weight: normal;
		padding: 0.8em 0.5em 0;
	}
	#desc {
		padding: 0 2em 2em;
	}
	#headimg h1 a,
	#desc {
		color: #666;
		text-decoration: none;
	}
	#headimg img {
	}
	</style>
<?php
}
endif; // rmmtheme_admin_header_style

if ( ! function_exists( 'rmmtheme_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see rmmtheme_custom_header_setup().
 *
 * @since rmmtheme 1.0
 */
function rmmtheme_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // rmmtheme_admin_header_image
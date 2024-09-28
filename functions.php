<?php
/**
 * marcho functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package marcho
 */


////////Installed admin plugin
function marcho_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'marcho Core', // The plugin name.
			'slug'               => 'marcho-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/marcho-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'Gutenberg Template Library & Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'marcho',         // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'marcho_register_required_plugins' );


///////////////paginate 
function marcho_paginate($query){
	$big = 999999999; // need an unlikely integer

	$paged = '';
	if(is_singular()) {
		$paged = get_query_var('page');
	} else {
		$paged = get_query_var('paged'); 
	}
 
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged),
		'total' => $query->max_num_pages,
		'prev_next' => false,
		
	) );
}


//////////////Sidebar
function marcho_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'marcho' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'marcho' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Car Pages Sidebar', 'marcho' ),
			'id'            => 'carsidebar',
			'description'   => esc_html__( 'Appear as a Sidebar on Car Pages', 'marcho' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	
}
add_action( 'widgets_init', 'marcho_widgets_init' );




////////////style,js
function marcho_enqueue_scripts(){
	//style

	wp_enqueue_style('marcho-style', get_template_directory_uri().'/css/style.min.css', array(), '1.0', 'all'); 
	
	//js
	wp_enqueue_script('main-script', get_template_directory_uri().'/js/main.min.js', array(), '1.0', true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'marcho_enqueue_scripts');



////////////// navigation conclusion
function marcho_theme_init(){
	//Регистрация локций меню
	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Footer Navigation'
	));


	//Поддержка html5 тэгов
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	

	//Поддержка многоязычности
	load_theme_textdomain('marcho', get_template_directory().'/lang');

	//Поддержка тумб
	add_theme_support( 'post-thumbnails' );
	add_image_size('car-cover', 240, 188, true);

	add_theme_support('post-formats',
		array(
			'video',
			'quote',
			'image',
			'gallery'
		));
	add_post_type_support('car','post-formats');

}
add_action('after_setup_theme','marcho_theme_init',0);




//////////////nav add li
function gc_add_class_on_li($classes,$item, $args){
	if(isset($args->add_li_class)){
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class','gc_add_class_on_li',1,3);

//////////////nav add link
function gc_add_class_on_link($atts, $item, $args) {
	if (isset($args->add_link_class)) {
		$atts['class'] = $args->add_link_class; 
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'gc_add_class_on_link', 1, 3);




function add_svg_to_upload_mimes($mimes) {
    // Только для пользователей с правами администратора
    if (current_user_can('administrator')) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');






/////////////svg add
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {

    // WP 5.1 +
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    else
        $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

    if( $dosvg ) {
        if( current_user_can('manage_options') ) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext']  = false;
            $data['type'] = false;
        }
    }
    return $data;
}
/////////////









//===================================
//user comments  width input
function marcho_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'marcho_content_width', 640 );
}
add_action( 'after_setup_theme', 'marcho_content_width', 0 );


//user comments
function marcho_custom_comments($comment, $args, $depth){

	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard">
		<?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">Author: %s</cite>' ), get_comment_author_link() ); ?>
        
			<div class="reply"><?php 
					comment_reply_link( 
						array_merge( 
							$args, 
							array( 
								'add_below' => $add_below, 
								'depth'     => $depth, 
								'max_depth' => $args['max_depth'] 
							) 
						) 
					); ?>
			</div>
		
		</div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','marcho' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>
 
        <?php comment_text(); ?>
 
        <?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}







/* 58 пейдж  попробивать вручную */
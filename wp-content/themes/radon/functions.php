<?php
if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');
	register_nav_menus( array(
	  'top_menu' => 'Top Navigation Menu',
	  'main_menu' => 'Main Pages Navigation Menu',
	  'mobile_menu' => 'Total Pages Navigation Menu on Mobile'
	) );

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    //add_image_size('large', 700, '', true); // Large Thumbnail
    //add_image_size('medium', 250, '', true); // Medium Thumbnail
    /*add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('front', 230, 186, true); // front boxes Thumbnail
    add_image_size('front310', 310, 332, true);
    add_image_size('front310184', 310, 184, true);
    //add_image_size('sliderhome', 672, 300, true);
	bt_add_image_size( 'sliderhome', 672, 300, array( 'center', 'top' ) );
	bt_add_image_size( 'sliderhomesmall', 122, 61, array( 'center', 'top' ) );
    add_image_size('menu scout', 140, 93, true); // front boxes Thumbnail
    add_image_size('top_bg', 975, '', true); // top bg
    add_image_size('front235', 235, 260, true); // front boxes annual report
    add_image_size('front320', 320, 320, true); // front boxes annual report
    add_image_size('front434', 434, 434, true); // front boxes annual report
    add_image_size('front490', 490, 260, true); // front boxes annual report
    add_image_size('anual-slider', '', 584, true); // front boxes annual report
    //add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');*/

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
/*if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
*/
// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 15;
}
function html5wp_post_on_pages($length) // Create 20 Word Callback for author page Excerpts, call using html5wp_excerpt('html5wp_author');
{
    return 43;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_mobile_slider($length)
{
    return 7;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
// Create 1 Custom Post type for a Demo, called HTML5-Blank
/*function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'volunteer'); // Register Taxonomies for Category
    //register_taxonomy_for_object_type('post_tag', 'volunteer');
    register_post_type('volunteer', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Volunteers', 'volunteer'), // Rename these to suit
            'singular_name' => __('Volunteer', 'volunteer'),
            'add_new' => __('Add New', 'volunteer'),
            'add_new_item' => __('Add New Volunteer', 'volunteer'),
            'edit' => __('Edit', 'volunteer'),
            'edit_item' => __('Edit Volunteer', 'volunteer'),
            'new_item' => __('New Volunteer', 'volunteer'),
            'view' => __('View Volunteer', 'volunteer'),
            'view_item' => __('View Volunteer', 'volunteer'),
            'search_items' => __('Search Volunteer', 'volunteer'),
            'not_found' => __('No Volunteer Posts found', 'volunteer'),
            'not_found_in_trash' => __('No Volunteer Posts found in Trash', 'volunteer')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));
    register_post_type('employee', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Employees', 'employee'), // Rename these to suit
            'singular_name' => __('Employee', 'employee'),
            'add_new' => __('Add New', 'employee'),
            'add_new_item' => __('Add New Employee', 'employee'),
            'edit' => __('Edit', 'employee'),
            'edit_item' => __('Edit Employee', 'employee'),
            'new_item' => __('New Employee', 'employee'),
            'view' => __('View Employee', 'employee'),
            'view_item' => __('View Employee', 'employee'),
            'search_items' => __('Search Employee', 'employee'),
            'not_found' => __('No Employee Posts found', 'employee'),
            'not_found_in_trash' => __('No Employee Posts found in Trash', 'employee')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));
    //register_taxonomy_for_object_type('category', 'volunteer'); // Register Taxonomies for Category
    //register_taxonomy_for_object_type('post_tag', 'volunteer');
    /*register_post_type('newsletter', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Newsletters', 'newsletter'), // Rename these to suit
            'singular_name' => __('Newsletter', 'newsletter'),
            'add_new' => __('Add New', 'newsletter'),
            'add_new_item' => __('Add New Newsletter', 'newsletter'),
            'edit' => __('Edit', 'newsletter'),
            'edit_item' => __('Edit Newsletter', 'newsletter'),
            'new_item' => __('New Newsletter', 'newsletter'),
            'view' => __('View Newsletter', 'newsletter'),
            'view_item' => __('View Newsletter', 'newsletter'),
            'search_items' => __('Search Newsletter', 'newsletter'),
            'not_found' => __('No Newsletter Posts found', 'newsletter'),
            'not_found_in_trash' => __('No Newsletter Posts found in Trash', 'newsletter')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));*/
    /*register_post_type('commissioner', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Commissioner', 'commissioner'), // Rename these to suit
            'singular_name' => __('Commissioner', 'commissioner'),
            'add_new' => __('Add New', 'commissioner'),
            'add_new_item' => __('Add New Commissioner', 'commissioner'),
            'edit' => __('Edit', 'commissioner'),
            'edit_item' => __('Edit Commissioner', 'commissioner'),
            'new_item' => __('New Commissioner', 'commissioner'),
            'view' => __('View Commissioner', 'commissioner'),
            'view_item' => __('View Commissioner', 'commissioner'),
            'search_items' => __('Search Commissioner', 'commissioner'),
            'not_found' => __('No Commissioner Posts found', 'commissioner'),
            'not_found_in_trash' => __('No Commissioner Posts found in Trash', 'commissioner')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));
register_post_type('contact_info', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Contact Info', 'contact_info'), // Rename these to suit
            'singular_name' => __('Contact Information', 'contact_info'),
            'add_new' => __('Add New', 'contact_info'),
            'add_new_item' => __('Add New Contact Information', 'contact_info'),
            'edit' => __('Edit', 'contact_info'),
            'edit_item' => __('Edit Contact Information', 'contact_info'),
            'new_item' => __('New Contact Information', 'contact_info'),
            'view' => __('View Contact Information', 'contact_info'),
            'view_item' => __('View Contact Information', 'contact_info'),
            'search_items' => __('Search Contact Information', 'contact_info'),
            'not_found' => __('No Contact Information Posts found', 'contact_info'),
            'not_found_in_trash' => __('No Contact Information Posts found in Trash', 'contact_info')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));
    register_post_type('chief', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Chief Post', 'chief'), // Rename these to suit
            'singular_name' => __('Chief Post', 'chief'),
            'add_new' => __('Add New', 'chief'),
            'add_new_item' => __('Add New Chief Post', 'chief'),
            'edit' => __('Edit', 'chief'),
            'edit_item' => __('Edit Chief Post', 'chief'),
            'new_item' => __('New Chief Post', 'chief'),
            'view' => __('View Chief Post', 'chief'),
            'view_item' => __('View Chief Post', 'chief'),
            'search_items' => __('Search Chief Post', 'chief'),
            'not_found' => __('No Chief Post found', 'chief'),
            'not_found_in_trash' => __('No Chief Post found in Trash', 'chief')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
        //'taxonomies' => array(
            //'post_tag',
         //   'category'
      //  ) // Add Category and Post Tags support
    ));
	
}

// Custom Taxonomy Code
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
//register_taxonomy( 'topic',array('volunteer','employee','page'), array( 'hierarchical' => true, 'label' => 'Topics', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'topic','volunteer', array( 'hierarchical' => true, 'label' => 'Topics Volunteer', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section', 'volunteer', array( 'hierarchical' => true, 'label' => 'Section Volunteer', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section2', 'employee', array( 'hierarchical' => true, 'label' => 'Section Employee', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section3', 'chief', array( 'hierarchical' => true, 'label' => 'Section Chief', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'topic2', 'employee', array( 'hierarchical' => true, 'label' => 'Topics Employee', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'groups', 'newsletter', array( 'hierarchical' => true, 'label' => 'Groups', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'states', 'contact_info', array( 'hierarchical' => true, 'label' => 'States', 'query_var' => true, 'rewrite' => true ) );
//register_taxonomy( 'prod_acusticos', 'html5-blank', array( 'hierarchical' => true, 'label' => 'Acústicos', 'query_var' => true, 'rewrite' => true ) );
//posts for everybody
register_taxonomy( 'type','post', array( 'hierarchical' => true, 'label' => 'Post Main Section', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'topic_volunteer','post', array( 'hierarchical' => true, 'label' => 'Topics Volunteer', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'topic_employee','post', array( 'hierarchical' => true, 'label' => 'Topics Employee', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section_volunteer', 'post', array( 'hierarchical' => true, 'label' => 'Role Volunteer', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section_employee', 'post', array( 'hierarchical' => true, 'label' => 'Role Employee', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'section_chief', 'post', array( 'hierarchical' => true, 'label' => 'Role Chief', 'query_var' => true, 'rewrite' => true ) );
}

// Add role class to body
function add_role_to_body($classes) {
    
    global $current_user;
    $user_role = array_shift($current_user->roles);
    
    $classes .= 'role-'. $user_role;
    return $classes;
}
//add_filter('body_class','add_role_to_body');
add_filter('admin_body_class', 'add_role_to_body');*/


/*------------------------------------*\
	Custom Logo wp-login
\*------------------------------------*/
function my_custom_login_logo() {
    echo '<style type="text/css">
       body.login h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png);width:200px;height:43px;
            background-size:auto;
        }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

add_filter( 'body_class', 'my_neat_body_class');
function my_neat_body_class( $classes ) {
     if (!is_front_page())
          $classes[] = '    not-home';
     return $classes;
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

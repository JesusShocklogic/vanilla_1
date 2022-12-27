<?php
include("includes/index.php");

/*
* Returning the default speakers avatar image file
*/

function default_speaker_avatar()
{
    if (isset(get_field('general_theme_settings_group', "option")['avatar_for_speakers']['url'])) {
        return get_field('general_theme_settings_group', "option")['avatar_for_speakers']['url'];
    } else {
        return get_template_directory_uri() . "/assets/images/speaker_avatar.jpg";
    }
}

/*
* Changing the Login logo
*/
function my_login_logo()
{
    if (get_field('general_theme_settings_group', "option")['login_image']) : ?>
        <style type="text/css">
            #login h1 a,
            .login h1 a {
                background-image: url("<?= get_field('general_theme_settings_group', "option")['login_image']['url'] ?>");
                background-size: contain;
                background-position: center center;
                background-repeat: no-repeat;
                padding-bottom: 30px;
                width: 100%;
                height: 70px;
                margin: 0 auto;
            }
        </style>
<?php endif;
}
add_action('login_enqueue_scripts', 'my_login_logo');

/*
* Remove the Wordpress Version Generator meta tag
*/
//Remove the wordpress version generator
remove_action('wp_head', 'wp_generator');

/**
 * Disable the wp emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}
/***  ***/

// Removing the admin bar
add_filter('show_admin_bar', '__return_false');

//Add thumbnail support
add_theme_support('post-thumbnails');

//Add excerpt to posts and pages
add_post_type_support('page', 'excerpt');
add_post_type_support('post', 'excerpt');

/*
* Registering Style sheets
*/
add_action('init', function () {
    wp_register_style("style", get_template_directory_uri() . "/style.css", array(), true);
    wp_register_style("style-sass", get_template_directory_uri() . "/assets/css/style.css", array(), true);
    wp_register_style("footer", get_template_directory_uri() . "/assets/css/footer.css", array(), true);
    wp_register_style("bootstrap", get_template_directory_uri() . "/assets/css/bootstrap.css", array(), true);
    wp_register_script("base", get_template_directory_uri() . "/assets/js/base.js", array(), true);
    wp_register_style("swiper-css", get_template_directory_uri() . "/assets/css/swiper-bundle.min.css", array(), true);
    wp_register_script("swiper-js", get_template_directory_uri() . "/assets/js/swiper.js", array(), true);
    wp_register_style("modal-css", get_template_directory_uri() . "/assets/css/modal.css", array(), true);
    wp_register_style("social-icon-widget", get_template_directory_uri() . "/template-parts/social-icons/social-icons-widget.css", array(), true);
});


/*
* wp_head actions
*/
add_action("get_header", function () {
    wp_enqueue_style('style');
    wp_enqueue_style('style-sass');
    wp_enqueue_style("bootstrap");
});

/*
* wp_footer actions
*/
add_action("wp_footer", function () {
    //wp_enqueue_script('jquery');
    wp_enqueue_script('base');
});

/*
 * Register my Menu
 */
function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main menu'),
        )
    );
}
add_action('init', 'register_my_menus');

/*
* ACF option menu in WP Dashboard
*/
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Menu Settings',
        'menu_title'    => 'Menu',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Social Icons Settings',
        'menu_title'    => 'Social Icons',
        'parent_slug'    => 'theme-general-settings',
    ));
} //ACF option menu in WP Dashboard
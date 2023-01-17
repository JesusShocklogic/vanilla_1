<?php
/*
* Jesus Carrero (JC)
* PLEASE READ:
* The Custom Post Types are managed fron the Wordpress Dashboard, with the plugin CPT UI.
* This is a copy of all the current Custom Post Types that we are using in the theme, in case we need to apply
* a git pull in a project that does not contain the plugin installed.
*
* PLEASE, update this document if you believe it is outdated with the current Cusotm Post Types managed by the plugin.
* You can find this code in the Wordpress dashboard - CPT UI - tools - Get Code
*/

function cptui_register_my_cpts()
{

    /**
     * Post Type: Speakers.
     */

    $labels = [
        "name" => esc_html__("Speakers", "custom-post-type-ui"),
        "singular_name" => esc_html__("speaker", "custom-post-type-ui"),
        "menu_name" => esc_html__("My Speakers", "custom-post-type-ui"),
        "all_items" => esc_html__("All Speakers", "custom-post-type-ui"),
        "add_new" => esc_html__("Add new", "custom-post-type-ui"),
        "add_new_item" => esc_html__("Add new speaker", "custom-post-type-ui"),
        "edit_item" => esc_html__("Edit speaker", "custom-post-type-ui"),
        "new_item" => esc_html__("New speaker", "custom-post-type-ui"),
        "view_item" => esc_html__("View speaker", "custom-post-type-ui"),
        "view_items" => esc_html__("View Speakers", "custom-post-type-ui"),
        "search_items" => esc_html__("Search Speakers", "custom-post-type-ui"),
        "not_found" => esc_html__("No Speakers found", "custom-post-type-ui"),
        "not_found_in_trash" => esc_html__("No Speakers found in bin", "custom-post-type-ui"),
        "parent" => esc_html__("Parent speaker:", "custom-post-type-ui"),
        "featured_image" => esc_html__("Featured image for this speaker", "custom-post-type-ui"),
        "set_featured_image" => esc_html__("Set featured image for this speaker", "custom-post-type-ui"),
        "remove_featured_image" => esc_html__("Remove featured image for this speaker", "custom-post-type-ui"),
        "use_featured_image" => esc_html__("Use as featured image for this speaker", "custom-post-type-ui"),
        "archives" => esc_html__("speaker archives", "custom-post-type-ui"),
        "insert_into_item" => esc_html__("Insert into speaker", "custom-post-type-ui"),
        "uploaded_to_this_item" => esc_html__("Upload to this speaker", "custom-post-type-ui"),
        "filter_items_list" => esc_html__("Filter Speakers list", "custom-post-type-ui"),
        "items_list_navigation" => esc_html__("Speakers list navigation", "custom-post-type-ui"),
        "items_list" => esc_html__("Speakers list", "custom-post-type-ui"),
        "attributes" => esc_html__("Speakers attributes", "custom-post-type-ui"),
        "name_admin_bar" => esc_html__("speaker", "custom-post-type-ui"),
        "item_published" => esc_html__("speaker published", "custom-post-type-ui"),
        "item_published_privately" => esc_html__("speaker published privately.", "custom-post-type-ui"),
        "item_reverted_to_draft" => esc_html__("speaker reverted to draft.", "custom-post-type-ui"),
        "item_scheduled" => esc_html__("speaker scheduled", "custom-post-type-ui"),
        "item_updated" => esc_html__("speaker updated.", "custom-post-type-ui"),
        "parent_item_colon" => esc_html__("Parent speaker:", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Speakers", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "speakers", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail"],
        "taxonomies" => ["category"],
        "show_in_graphql" => false,
    ];

    register_post_type("speakers", $args);

    /**
     * Post Type: Partners.
     */

    $labels = [
        "name" => esc_html__("Partners", "custom-post-type-ui"),
        "singular_name" => esc_html__("Partner", "custom-post-type-ui"),
        "menu_name" => esc_html__("My Partners", "custom-post-type-ui"),
        "all_items" => esc_html__("All Partners", "custom-post-type-ui"),
        "add_new" => esc_html__("Add new", "custom-post-type-ui"),
        "add_new_item" => esc_html__("Add new Partner", "custom-post-type-ui"),
        "edit_item" => esc_html__("Edit Partner", "custom-post-type-ui"),
        "new_item" => esc_html__("New Partner", "custom-post-type-ui"),
        "view_item" => esc_html__("View Partner", "custom-post-type-ui"),
        "view_items" => esc_html__("View Partners", "custom-post-type-ui"),
        "search_items" => esc_html__("Search Partners", "custom-post-type-ui"),
        "not_found" => esc_html__("No Partners found", "custom-post-type-ui"),
        "not_found_in_trash" => esc_html__("No Partners found in bin", "custom-post-type-ui"),
        "parent" => esc_html__("Parent Partner:", "custom-post-type-ui"),
        "featured_image" => esc_html__("Featured image for this Partner", "custom-post-type-ui"),
        "set_featured_image" => esc_html__("Set featured image for this Partner", "custom-post-type-ui"),
        "remove_featured_image" => esc_html__("Remove featured image for this Partner", "custom-post-type-ui"),
        "use_featured_image" => esc_html__("Use as featured image for this Partner", "custom-post-type-ui"),
        "archives" => esc_html__("Partner archives", "custom-post-type-ui"),
        "insert_into_item" => esc_html__("Insert into Partner", "custom-post-type-ui"),
        "uploaded_to_this_item" => esc_html__("Upload to this Partner", "custom-post-type-ui"),
        "filter_items_list" => esc_html__("Filter Partners list", "custom-post-type-ui"),
        "items_list_navigation" => esc_html__("Partners list navigation", "custom-post-type-ui"),
        "items_list" => esc_html__("Partners list", "custom-post-type-ui"),
        "attributes" => esc_html__("Partners attributes", "custom-post-type-ui"),
        "name_admin_bar" => esc_html__("Partner", "custom-post-type-ui"),
        "item_published" => esc_html__("Partner published", "custom-post-type-ui"),
        "item_published_privately" => esc_html__("Partner published privately.", "custom-post-type-ui"),
        "item_reverted_to_draft" => esc_html__("Partner reverted to draft.", "custom-post-type-ui"),
        "item_scheduled" => esc_html__("Partner scheduled", "custom-post-type-ui"),
        "item_updated" => esc_html__("Partner updated.", "custom-post-type-ui"),
        "parent_item_colon" => esc_html__("Parent Partner:", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Partners", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "partner", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("partner", $args);
}

add_action('init', 'cptui_register_my_cpts');
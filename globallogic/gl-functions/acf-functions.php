<?php

// admin ACF options page
if (function_exists('acf_add_options_page') && is_admin()) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme career single page Settings',
        'menu_title' => 'careers single page',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Default Banner Image',
        'menu_title' => 'Default Banner Image',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));


    function acf_load_dy_taxonomy_list($field)
    {
        // Reset choices
        $field['choices'] = array();

        $args = array(
            'public'   => true,
            '_builtin' => false
        );
        $output = 'objects'; // or objects
        $taxonomies = get_taxonomies($args, $output);

        // Loop through get officesne ID and Name
        if ($taxonomies) {
            $field['choices'][''] = 'Select Taxonomy';
            foreach ($taxonomies as $taxonomy) {
                $field['choices'][$taxonomy->name] = $taxonomy->label . ' ('. $taxonomy->name .')';
            }
        }

        // return the field
        return $field;
    }

    add_filter('acf/load_field/name=dy_taxonomy', 'acf_load_dy_taxonomy_list');

    function acf_load_dy_post_type_list($field)
    {
        // Reset choices
        $field['choices'] = array();

        $args = array(
            'public'   => true,
            '_builtin' => false
        );

        $post_types = get_post_types($args, 'objects');

        // Loop through get officesne ID and Name
        if ($post_types) {
            $field['choices'][''] = 'Select Post Type';
            foreach ($post_types as $post_type) {
                $field['choices'][$post_type->name] = $post_type->label;
            }
        }

        // return the field
        return $field;
    }

    add_filter('acf/load_field/name=dy_post_type', 'acf_load_dy_post_type_list');

    function acf_load_color_field_choices($field) {
        $field['choices'] = array();
        $args = array('hide_empty' => false);
        $categories = get_terms('insight-subcats', $args);
        $industries = get_terms('insight-industry', $args);
        $choices = array();
        foreach ($categories as $categorie) {
            $choices[$categorie->slug] = $categorie->name;
        }
        foreach ($industries as $industrie) {
            $choices[$industrie->slug] = $industrie->name;
        }
        if (is_array($choices)) {
            foreach ($choices as $key => $value) {
                $field['choices'][$key] = $value;
            }
        }
        return $field;
    }
    
    add_filter('acf/load_field/name=catindustry_choices', 'acf_load_color_field_choices');
}


function acf_load_blog_authorss($field) {
    // Reset choices
    $field['choices'] = array();

    // Args for bloog author
    $args = array(
        'numberposts' => -1,
        'post_type' => 'blogauthor',
        'post_status' => 'publish'
    );
    $blog_authors = get_posts($args);

    // Loop through get author name and title
    if ($blog_authors) {
        foreach ($blog_authors as $blog_author) {
            $field['choices'][$blog_author->post_name] = $blog_author->post_title;
        }
    }

    // return the field
    return $field;
}

add_filter('acf/load_field/name=blogswhite_paper_author', 'acf_load_blog_authorss');           
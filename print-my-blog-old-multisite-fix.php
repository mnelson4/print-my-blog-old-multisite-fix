<?php
/**
 * @package PMB Multisite
 * @version 1.7.2
 */
/*
Plugin Name: PMB Multisite Fix
Description: Fix for a PMB user using multisite (originally on pre-3.5) who is getting the wrong URL for the PMB Pro Print Page. This overcomes that problem. Requires PMB 3.27.8
Author: Mike Nelson
Version: 1.0.0
*/
add_filter(
    '\PrintMyBlog\entities\ProjectGeneration::getGeneratedIntermediaryFileUrl return',
    'fix_wp_35_for_pmb'
);
function fix_wp_35_for_pmb($url){
    $url = str_replace(
        '/files',
        '/wp-content/blogs.dir/' . get_current_blog_id() . '/files',
        $url
    );
    return $url;
}
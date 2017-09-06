<?php
namespace Bezbeli;

class PostViews
{

    // function to display number of posts.
    public function get($postID)
    {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count=='') {
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count.' Views';
    }

    // function to count views.
    public function set($postID)
    {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count=='') {
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
}

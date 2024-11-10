<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class RelatedPosts extends Composer
{
    protected static $views = [
        'single',
    ];

    public function with()
    {
        return [
            'related_posts' => $this->getRelatedPosts(),
        ];
    }

    protected function getRelatedPosts()
    {
        $categories = wp_get_post_categories(get_the_ID());
        if (empty($categories)) {
            return [];
        }

        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()],
            'category__in' => $categories,
            'orderby' => 'rand',
        ];

        $related_query = new \WP_Query($args);
        return $related_query;
    }
}

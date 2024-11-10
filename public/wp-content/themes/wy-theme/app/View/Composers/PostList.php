<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PostList extends Composer
{
    protected static $views = [
        'archive-posts',
        'partials.content-archive',
    ];

    public function with()
    {
        return [
            'posts' => $this->posts(),
        ];
    }

    protected function posts()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => get_query_var('paged', 1),
        ];

        $query = new \WP_Query($args);
        return $query;
    }
}

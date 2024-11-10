<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class ArchiveEvent extends Composer
{
    protected static $views = [
        'archive-event',
    ];

    public function with()
    {
        return [
            'events' => $this->getEventPosts(),
        ];
    }

    protected function getEventPosts()
    {
        // Events ordered by acf date
        return new WP_Query([
            'post_type'      => 'event',
            'posts_per_page' => 6,
            'paged'          => max(1, get_query_var('paged')),
            'meta_key'       => 'begin_event_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC'
        ]);
    }
}

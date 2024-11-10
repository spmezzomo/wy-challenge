<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class ArchiveEvent extends Composer
{
    // Especifique a view para a qual esse Composer é aplicado
    protected static $views = [
        'archive-event',  // Para archive-event.blade.php
    ];

    public function with()
    {
        return [
            'events' => $this->getEventPosts(),
        ];
    }

    protected function getEventPosts()
    {
        // Configura a query para o post type 'event'
        return new WP_Query([
            'post_type'      => 'event',
            'posts_per_page' => 5,       // Defina o número de posts por página
            'paged'          => max(1, get_query_var('paged')),
        ]);
    }
}

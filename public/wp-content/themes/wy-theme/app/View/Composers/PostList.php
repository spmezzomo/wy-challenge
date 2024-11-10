<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PostList extends Composer
{
    protected static $views = [
        'archive-posts',  // Especifique o template onde essa query será usada
        'partials.content-archive',  // Exemplo de parcial para conteúdo de archive
    ];

    public function with()
    {
        return [
            'posts' => $this->posts(),
        ];
    }

    protected function posts()
    {
        // Define sua query personalizada
        $args = [
            'post_type' => 'post',  // ou um custom post type se necessário
            'posts_per_page' => 6, // Número de posts por página
            'paged' => get_query_var('paged', 1),
        ];

        $query = new \WP_Query($args);
        return $query;
    }
}

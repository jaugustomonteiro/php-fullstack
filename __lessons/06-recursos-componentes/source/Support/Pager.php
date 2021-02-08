<?php

namespace Source\Support;

use CoffeeCode\Paginator\Paginator;

class Pager extends Paginator {
    
    /**
     * Pager Constructor
     * @param string $link
     * @param string|null $title
     * @param array|null $first
     * @param array|null $last
     */
    public function __construct(string $link, ?string $title = null, ?array $first = null, ?array $last = null) {
        parent::__construct($link, $title, $first, $last);
    }
}
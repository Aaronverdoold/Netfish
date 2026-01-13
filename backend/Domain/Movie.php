<?php

declare(strict_types=1);

namespace Domain;

class Movie
{
    public $id;
    public $title;
    public $url;
    public $year;
    public $description;

    public function __construct(
        $id,
        $title,
        $url,
        $year,
        $description,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->year = $year;
        $this->description = $description;
    }
}

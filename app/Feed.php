<?php

namespace App;

use Carbon\Carbon;

class Feed {

    private $title;
    private $link;
    private $description;
    private $category;
    private $pubDate;

    /**
     * Feed constructor.
     * @param $title
     * @param $link
     * @param $description
     * @param $category
     * @param $pubDate
     */
    public function __construct ($title, $link, $description, $category, $pubDate)
    {
        $this->title = (string) $title;
        $this->link = (string) $link;
        $this->description = preg_replace('/<a[^>]*>(.*)<\/[^a]*a>|<br[^>]*>/','$1',(string) $description);
        $this->category = (string) $category;
        $this->pubDate = new Carbon((string) $pubDate);
    }

    /**
     * Método mágico para attributos de Feeds
     * @param $property
     * @return mixed
     */
    public function __get ($property)
    {
        return $this->$property;
    }
}
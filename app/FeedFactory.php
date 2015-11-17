<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FeedFactory {

    private $feeds;
    private $feed_url = 'http://g1.globo.com/dynamo/economia/rss2.xml';

    /**
     * FeedFactory constructor.
     * @param $cache
     */
    public function __construct ($cache = 5)
    {
        $this->feeds = Cache::remember('feedfactory.request', $cache, function() {
            return $this->request();
        });
    }

    /**
     * Busca online os feeds a serem exibidos
     * @return Collection
     */
    private function request() {

        $feeds = new Collection();

        $xml = new \SimpleXMLElement(file_get_contents($this->feed_url));

        foreach ($xml->channel->item as $item) {

            $feeds[] = new Feed($item->title, $item->link, $item->description, $item->category, $item->pubDate);
        }

        return $feeds;
    }

    /**
     * Obtem dentre os feeds recuperados
     * @param int $limit
     * @param string $order
     * @param string $direction
     * @return Collection
     */
    public function get($limit = 20, $order = 'pubDate', $direction = 'desc')
    {
        $sortFunc = $direction == 'desc' ? 'sortByDesc' : 'sortBy';

        return $this->feeds->$sortFunc(function ($item) use ($order) {
            return $item->$order;
        })->take($limit);
    }
}
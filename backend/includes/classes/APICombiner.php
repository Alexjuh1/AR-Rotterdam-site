<?php
require_once dirname(__FILE__) .  '/GooglePlaces.php';
require_once dirname(__FILE__) .  '/Wikipedia.php';

/**
 * Created by PhpStorm.
 * User: JV
 * Date: 4-4-2016
 * Time: 13:25
 */
class APICombiner
{
    private $places;
    private $wikipedia;

    public function __construct()
    {
        $this->places = new GooglePlaces();
        $this->wikipedia = new Wikipedia();
    }

    public function getJSON($place)
    {
        //echo var_dump(json_decode($this->places->getPlaceByName($place), true));
        $result = json_decode($this->places->getPlaceByName($place), true)['results'][0];

        //$details = $this->places->getDetails($result['place_id']);
        $image = $this->places->getImageByReference($result['photos'][0]['photo_reference']);

        $summary = json_decode($this->wikipedia->getArticle($place))->query->pages;

        // Simply get the first element, should only be one.
        foreach($summary as $page) {
            $summary = $page;
            break;
        }

        $return = [
            'name' => $result['name'],
            'rating' => $result['rating'],
            'image' => $image,
            'wikipedia' => current(explode(".", $summary->extract)) . '.' // https://stackoverflow.com/questions/1135467/does-anyone-have-a-php-snippet-of-code-for-grabbing-the-first-sentence-in-a-st
        ];

        return json_encode($return);
    }
}

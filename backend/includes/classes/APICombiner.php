<?php
require_once dirname(__FILE__) .  '/GooglePlaces.php';
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 4-4-2016
 * Time: 13:25
 */
class APICombiner
{
    private $places;

    public function __construct()
    {
        $this->places = new GooglePlaces();
    }

    public function getJSON($place)
    {
        //echo var_dump(json_decode($this->places->getPlaceByName($place), true));
        $result = json_decode($this->places->getPlaceByName($place), true)['results'][0];

        //$details = $this->places->getDetails($result['place_id']);
        $image = $this->places->getImageByReference($result['photos'][0]['photo_reference']);

        $return = [
            'name' => $result['name'],
            'rating' => $result['rating'],
            'image' => $image
        ];

        return json_encode($return);
    }
}
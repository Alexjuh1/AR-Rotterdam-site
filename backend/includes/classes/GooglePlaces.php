<?php
require_once dirname(__FILE__) .  '/API.php';

/**
 * Created by PhpStorm.
 * User: JV
 * Date: 4-4-2016
 * Time: 10:26
 */
class GooglePlaces extends API
{
    public function __construct()
    {
        $this->endpoint = "https://maps.googleapis.com/maps/api/place/";
        $this->apiKey = PLACES_API_KEY;
    }

    public function getImageByReference($ref)
    {
        $params = [
            'maxwidth' => '480',
            'maxheight' => '640',
            'photoreference' => $ref,
            'key' => $this->apiKey,
        ];

        $url = $this->endpoint . 'photo?' . http_build_query($params);
        $result = $this->imageRequest($url);
        return $result;
    }

    public function getPlaceByName($name)
    {
        $params = [
            'location' => ROTTERDAM_POINT,
            'radius' => LOCATION_RADIUS,
            'name' => $name,
            'key' => $this->apiKey,
        ];

        $url = $this->endpoint . 'nearbysearch/json?' . http_build_query($params);
        $result = $this->curlRequest($url);
        return $result;
    }

    public function getDetails($id)
    {
        $params = [
            'placeid' => $id,
            'key' => $this->apiKey,
        ];

        $url = $this->endpoint . 'details/json?' . http_build_query($params);
        $result = $this->curlRequest($url);
        return $result;
    }
}

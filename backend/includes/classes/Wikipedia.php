<?php
require_once dirname(__FILE__) .  '/API.php';

/**
 * Created by PhpStorm.
 * User: JV
 * Date: 5-4-2016
 * Time: 21:17
 *
 * Thanks: https://stackoverflow.com/questions/8555320/is-there-a-clean-wikipedia-api-just-for-retrieve-content-summary
 */
class Wikipedia extends API
{
    public function __construct()
    {
        $this->endpoint = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=true&explaintext=true&titles=Euromast";
    }

    public function getArticle($search)
    {
        $params = [
            'format' => 'json',
            'action' => 'query',
            'prop' => 'extracts',
            'exintro' => true,
            'explaintext' => true,
            'titles' => $search
        ];

        $url = $this->endpoint . http_build_query($params);
        $result = $this->curlRequest($url);
        return $result;
    }
}

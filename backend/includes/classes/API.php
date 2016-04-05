<?php
require_once dirname(__FILE__) .  '/../settings.php';

/**
 * Created by PhpStorm.
 * User: JV
 * Date: 4-4-2016
 * Time: 10:26
 */
class API
{
    protected $endpoint = '';
    protected $apiKey;

    /**
     * Request the information from the API and parse it.
     *
     * @param array $url
     * @return mixed|null
     */
    protected function curlRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $returnCode == 200 ? $data : null;
    }

    protected function imageRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data = curl_exec($ch);
        curl_close($ch);

        // Do some fancy (ugly) stuff to get the actual URL instead of an image.
        $start = strpos($data, "<A HREF=") + 9;
        $end = strpos($data, ">here") - 1;
        return substr($data, $start, $end - $start);
    }
}
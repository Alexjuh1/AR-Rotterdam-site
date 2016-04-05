<?php
require_once dirname(__FILE__) .  '/includes/classes/APICombiner.php';

//header("Content-Type: application/json");

if(!isset($_GET['place']))
    die("Your mom and I are disappointed in you.");

$api = new APICombiner();
$result = $api->getJSON(urlencode($_GET['place']));
echo $result;
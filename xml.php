<!DOCTYPE HTML>
<?php
$url = "http://suggestqueries.google.com/complete/search?output=toolbar&q=korea";
$ch = cURL_init();

cURL_setopt($ch, CURLOPT_URL, $url);
cURL_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = cURL_exec($ch);
cURL_close($ch); 

$object = simplexml_load_string($response);
$suggest0 = $object->CompleteSuggestion[0]->suggestion["data"];

echo $suggest0;

?>
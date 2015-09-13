<?php 

// Initialise curl resource
$curl = curl_init();

$worldcatKey = "l45E9GwC2Yex8qKqXdxkNznjn1mVGdG2ZjGLcaGxl9JBGX0AacC2aWmrGLXQkqF0nYvnk0BmVnSOMwUs";

// set options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://www.worldcat.org/webservices/catalog/search/worldcat/opensearch?q=APIs&wskey='.$worldcatKey
));
// Send curl request, save response
$resp = curl_exec($curl);
// Close curl request
curl_close($curl);

$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

foreach($array AS $prop => $val) {
  echo '<br/>'.$prop.' - '.$val;
}

?> 
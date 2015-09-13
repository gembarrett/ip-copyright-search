<?php 

// Initialise curl resource
$curl = curl_init();

$worldcatKey = 'l45E9GwC2Yex8qKqXdxkNznjn1mVGdG2ZjGLcaGxl9JBGX0AacC2aWmrGLXQkqF0nYvnk0BmVnSOMwUs';
$worldcatCatalogRequest = 'http://www.worldcat.org/webservices/catalog/search/worldcat/opensearch?q=APIs&wskey='.$worldcatKey;
$worldcatCitationRequest = 'http://www.worldcat.org/webservices/catalog/content/citations/'.$worldcatCatalogNo.'?wskey='.$worldcatKey;

// set options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $worldcatCatalogRequest
));
// Send curl request, save response
$resp = curl_exec($curl);
// Close curl request
curl_close($curl);

$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$entries = $array['entry'];

foreach($array['entry'] AS $entry) {
  echo "<h3>
        {$entry['author']['name']}
        </h3>
        <p>{$entry['id']}</p>
        <p>{$entry['summary']}</p>";
}

?> 
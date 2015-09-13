<?php 

// Initialise curl resource
$curl = curl_init();
$safeCreativeKey = "6u4m0k0kd3yjx2ez58rc9jx5i";
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

// convert xml into json object
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

// grab the only bit we're interested in
$entries = $array['entry'];

// for each bit of the thing we're interested in
foreach($array['entry'] AS $entry) {
  // grab the entry's id in case citation needed
  $stuff = explode('/', $entry['id']);
  echo $stuff[4];
  // print out the name and summary
  echo "<h3>
        {$entry['author']['name']}
        </h3>
        <p>{$entry['summary']}</p>";
}

?> 
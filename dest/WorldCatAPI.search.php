<?php 
$query = $_GET['search-keywords'];
$urlReadyQuery = urlencode($query);
// Initialise curl resource
$curl = curl_init();
$worldcatKey = 'RLjfLCzcrl6putyN1VWd17wSfX3r53vWnIhNyqkbTZwjtcrlv6oiwnlE9LEdTGsBezlaiFFeTm6omXeD';
$worldcatCatalogRequest = 'http://www.worldcat.org/webservices/catalog/search/worldcat/opensearch?q='.$urlReadyQuery.'&wskey='.$worldcatKey;

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
echo "<h2>Results from the OCLC</h2>";
// for each bit of the thing we're interested in
foreach($array['entry'] AS $entry) {
  // grab the entry's id in case citation needed
  $IPid = explode('/', $entry['id']);
  $title = $entry['title'];
  $author = $entry['author']['name'];
  $worldcatCatalogNo = $IPid[4];
  $xmlCitation = file_get_contents("http://www.worldcat.org/webservices/catalog/content/citations/{$worldcatCatalogNo}?wskey={$worldcatKey}");
  // print out the name and summary
  print "<div class='result-entry' data-ipid='{$IPid[4]}' data-a='{$author}'>
        <h3>$title</h3>
        </h3>
        <p>$author</p>
        <button>Citation</button>
        <div class='citation'>
        <input type='text' class='citationCopyText' value='{$xmlCitation}' readonly='readonly'>
        <button>Copy</button>
        </div>
        </div>";
}

?> 
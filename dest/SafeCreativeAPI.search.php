<?php
/*
	Copyright 2010 Safe Creative

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//Arena config to start playing with the api
//include("../SafeCreativeAPI.config.arena.php");
//Production config (you can enable this, no key neeeded to search!)

include("SafeCreativeAPI.inc.php");

define("DEBUG",false);

function showSearchWorks($searchResults) {
	$array = json_decode($searchResults,TRUE);

	// grab the only bit we're interested in
	$entries = $array['listpage']['list'];

	// check we have results
	
	
	// for each bit of the thing we're interested in
	foreach($array['entry'] AS $entry) {
	  // grab the entry's id in case citation needed
	  $stuff = explode('/', $entry['id']);
	  echo $stuff[4];
	  // print out the name and summary
	  echo "<h3>
	        {$entry['title']} - 
	        {$entry['author']['name']}
	        </h3>
	        <p>{$entry['summary']}</p>";
	}

	// debug($results);
	echo $array['listpage']['list'][0]['title'];
	// if($searchResults && $searchResults[0]recordtotal) {
	// 	// msg("Total pages: ".$searchResults->pagetotal);
	// 	// msg("Total results: ".$searchResults->recordtotal);
	// 	foreach($searchResults->list->work as $work) {
	// 		echo $searchResults;
	// 		// $workUrl = $work->{'human-url'};
	// 		// $thumbnail = $work->thumbnail;
	// 		// msg("<a href=\"$workUrl\"><img src=\"$thumbnail\" title=\"".$work->title."\" align=\"top\"></a> <a href=\"$workUrl\">".$work->title."</a>");
	// 	}
	// } else {
	// 	msg("No search results available");
	// }
}

$query = $_GET['search-keywords'];


//Search by passed query:
$params = array(
	'component' => 'search.byquery',
	'query' => $query,
	'format'=> 'json'
);

$results = search($params);
showSearchWorks($results);



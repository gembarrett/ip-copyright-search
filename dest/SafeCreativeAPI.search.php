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

define("DEBUG",true);

function showSearchWorks($searchResults) {
	//debug($results);
	if($searchResults && $searchResults->recordtotal) {
		msg("Total pages: ".$searchResults->pagetotal);
		msg("Total results: ".$searchResults->recordtotal);
		foreach($searchResults->list->work as $work) {
			$workUrl = $work->{'human-url'};
			$thumbnail = $work->thumbnail;
			msg("<a href=\"$workUrl\"><img src=\"$thumbnail\" title=\"".$work->title."\" align=\"top\"></a> <a href=\"$workUrl\">".$work->title."</a>");
		}
	} else {
		msg("No search results available");
	}
}

$query = $_GET['search-keywords'];

//Search by passed query:
$params = array(
	'component' => 'search.byquery',
	'query' => $query,
);

$results = search($params);
showSearchWorks($results);



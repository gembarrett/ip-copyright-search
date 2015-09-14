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

$query = $_GET['search-keywords'];

function showSearchWorks($searchResults) {
	$array = json_decode($searchResults,TRUE);
	if($array['listpage']['recordtotal'] != 0) {
		$entries = $array['listpage']['list'];
		foreach ($entries AS $entry) {
			$license = "<a href='{$entry['license']['human-url']}'>
									{$entry['license']['name']}</a>";
			$licenseURL = $entry['human-url'];
			$title = "<a href=\"$licenseURL\" target=\"_blank\">{$entry['title']}</a>";
			$shortLicenseURL = $entry['license']['human-url'];
			$shortLicense = $entry['license']['shortname'];
			if(!($entry['authors'][0]['name'])) {
				$rightsHolder = $entry['rights-holders'][0]['name'];
				$xmlCitation = "<p>$title - <a href=\"$shortLicenseURL\" target=\"_blank\">$shortLicense</a> - $rightsHolder</p>";
				print "<div class='result-entry' data-ipid='{$entry['human-url']}' data-a='$rightsHolder' data-category='{$entry['worktypegroup']['code']}'>
							<h4>$title</h4>
							<p>$rightsHolder - $license</p>
							<button>Attribution</button>
							<div class='citation'>
							<input type='text' class='citationCopyText' value='{$xmlCitation}' readonly='readonly'>
							<button>Copy</button>
							</div>
							</div>";				
			} else {
				$author = $entry['authors'][0]['name'];
				$xmlCitation = "<p>$title - <a href=\"$shortLicenseURL\" target=\"_blank\">$shortLicense</a> - $author</p>";
				print "<div class='result-entry' data-ipid='{$entry['human-url']}' data-a='$author' data-category='{$entry['worktypegroup']['code']}'>
							<h4>$title</h4>
							<p>$author - $license</p>
							<button>Attribution</button>
							<div class='citation'>
							<input type='text' class='citationCopyText' value='{$xmlCitation}' readonly='readonly'>
							<button>Copy</button>
							</div>
							</div>";
			}
		}
	} else {
		echo "no results";
	}

}



//Search by passed query:
$params = array(
	'component' => 'search.byquery',
	'query' => $query,
	'format'=> 'json'
);

$results = search($params);
showSearchWorks($results);

?>

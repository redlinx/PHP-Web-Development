<?php

//$json = file_get_contents('http://data.gharchive.org/2015-01-{01..31}-{0..23}.json.gz');

$json = '[
  {
    "issue_status": "\"closed\"",
    "cnt": "281078"
  },
  {
    "issue_status": "\"reopened\"",
    "cnt": "13358"
  },
  {
    "issue_status": "\"opened\"",
    "cnt": "416511"
  }
]
';

$result = json_decode($json, true);

echo "<pre>";
print_r($result);
echo "</pre>";

?>
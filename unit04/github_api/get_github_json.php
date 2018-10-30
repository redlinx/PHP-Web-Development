<?php
/*
source: 
https://stackoverflow.com/questions/37141315/file-get-contents-gets-403-from-api-github-com-every-time
https://developer.github.com/v3/guides/getting-started/
https://developer.github.com/v3/users/#get-a-single-user
*/
$opts = [
        'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: redlinx'
                ]
        ]
];

// $url = "https://api.github.com/zen";
// $url = 'https://api.github.com/users';
$url = "https://api.github.com/users/bmizerany/followers";

$context = stream_context_create($opts);
$content = file_get_contents($url, false, $context);

$result = json_decode($content, true);

echo "<pre>";
print_r($result);
echo "</pre>";


?>
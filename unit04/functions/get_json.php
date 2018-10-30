<?php

// source: https://stackoverflow.com/questions/37141315/file-get-contents-gets-403-from-api-github-com-every-time

$opts = [
        'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: redlinx'
                ]
        ]
];

// $url = "https://api.github.com/zen";
$url = 'https://api.github.com/users/defunkt';

$context = stream_context_create($opts);
$content = file_get_contents($url, false, $context);

$result = json_decode($content, true);

echo "<pre>";
print_r($result);
echo "</pre>";


?>
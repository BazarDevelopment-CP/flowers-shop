<?php
/*
verify request
*/
$secretKey = 'sova123';
$requestData = file_get_contents('php://input');
$signature = 'sha1=' . hash_hmac('sha1', $requestData, $secretKey);
if ($signature != ($_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '')) {
    http_response_code(403);
    die('Not Allowed');
}

/*
push event
*/
$dir = '/home/bazardot/fshop.jokeit.io';
exec("cd $dir && git pull 2>&1", $output);
print_r($output);

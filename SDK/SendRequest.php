<?php
require_once 'SDK/Constants/postData.php';
$ch = curl_init();
$post_data = array(
    "username" => SDK_POST_USERNAME,
    "password" => SDK_POST_PASSWORD,
    "key" => SDK_POST_KEY
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_URL, SDK_POST_URL);

$res = curl_exec($ch);

curl_close($ch);

print_r($res);
<?php


$data = [
    "key" => "la09823",
    "content" => "jfkdls",
];

$req = curl_init();
curl_setopt_array($req, [
    CURLOPT_URL            => "https://httpbin.org/put",
    CURLOPT_CUSTOMREQUEST  => "PUT",
    CURLOPT_POSTFIELDS     => json_encode($data),
    CURLOPT_HTTPHEADER     => [ "Content-Type" => "application/json" ],
    CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($req);
print_r($response);

?>
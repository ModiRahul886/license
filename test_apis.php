<?php
// User credentials found from DB
$email = 'info@iteca.si';
$licenseKey = 'ITEC-FQ91-6L4I-P0E1-93CO';

// Common simulated client data
$domain = 'localhost';
$http_host = 'localhost';
$remote_addr = '127.0.0.1';
$server_name = 'server_test';
$server_addr = '127.0.0.1';
$verify_date = date('Y-m-d'); // Current date for validation

// Helper function to call API
function callApi($action, $params)
{
    $url = 'http://localhost/license/index.php/webservices'; // Trying with index.php

    // Add action to params
    $params['action'] = $action;

    // Function to perform the request
    $doRequest = function ($targetUrl) use ($params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ['code' => $httpCode, 'response' => $response];
    };

    echo "Testing Action: $action\n";
    echo "URL: $url\n";

    $result = $doRequest($url);

    // If 404, maybe modify URL (remove index.php or fix path)
    if ($result['code'] == 404) {
        echo "404 on default URL, trying without index.php...\n";
        $url = 'http://localhost/license/webservices';
        $result = $doRequest($url);
    }

    echo "HTTP Code: " . $result['code'] . "\n";
    echo "START_RESPONSE\n";
    echo $result['response'] . "\n";
    echo "END_RESPONSE\n";
    echo "--------------------------------------------------\n";
}

// 1. Test 'authetication' API
$authParams = [
    'email' => $email,
    'domain' => $domain,
    'http_host' => $http_host,
    'remote_addr' => $remote_addr,
    'server_name' => $server_name,
    'server_addr' => $server_addr
];
callApi('authetication', $authParams);

// 2. Test 'verifyLicense' API
$licenseParams = [
    'licensekey' => $licenseKey,
    'email' => $email,
    'domain' => $domain,
    'http_host' => $http_host,
    'remote_addr' => $remote_addr,
    'server_name' => $server_name,
    'server_addr' => $server_addr,
    'verify_date' => $verify_date
];
callApi('verifyLicense', $licenseParams);
?>
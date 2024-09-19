<?php

echo '{status:"success"}';
exit;

require_once 'vendor/autoload.php';

$apiUri = 'https://api.sandbox.iys.org.tr';
$iysBrandCode = 'YOUR_BRAND_CODE';
$iysCode = 'YOUR_IYS_CODE';

// test account
$email = 'YOUR_MAIL';
$password = 'YOUR_PASSWORD';

$iys = new Iys\IysApi($apiUri, $iysCode, $iysBrandCode);

// login to iys system
$login = $iys->authentication->loginWithOauth2($email, $password);
if ($login instanceof \Iys\Auth\Response\Token) {
    $iys->setToken($login->getAccessToken());
    $iys->setRefreshToken($login->getRefreshToken());
}

// create a consent
$phoneNumber = '+905415350767';
$email = 'presta.tr@gmail.com';
$date = date('Y-m-d H:i:s');
$consentModel = $iys->consentManagement->generateConsent($email, Iys\ConsentManagement\Enum\ConsentType::EMAIL, Iys\ConsentManagement\Enum\ConsentSource::WEB, Iys\ConsentManagement\Enum\ConsentStatus::APPROVE, $date, Iys\ConsentManagement\Enum\RecipientType::INDIVIDUAL);
$result = $iys->consentManagement->createSingleConsent($consentModel);

var_dump($result);
exit;

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/whmcs-8.1.3/includes/api.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    http_build_query(
        array(
            'action' => 'GetProducts',
            // See https://developers.whmcs.com/api/authentication
            'username' => 'tJykFvZu9oACPZN9QTCmKMUyoJJIqtJ9',
            'password' => '9SswPkyukEhQ2thLL0q4j2zKC4XyDokT',
            'pid' => '1',
            'responsetype' => 'json',
        )
    )
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);exit;


if( !isset($_GET['key']) or $_GET['key'] != 'cA3pP2dY1mD6sK7l' ){
    die('--');
}

require_once 'init.php';

$command = 'GetProducts';
$postData = array(
    'gid' => '1',
);
$adminUsername = 'presta.tr@gmail.com'; // Optional for WHMCS 7.2 and later

$results = localAPI($command, $postData, $adminUsername);

echo "<pre>";
print_r($results);
echo "</pre>";
*/
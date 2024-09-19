<?php

require_once 'vendor/autoload.php';

class Iys_api{
    protected $iys;

    public function __construct(){
        $apiUri = 'https://api.sandbox.iys.org.tr';
        $iysBrandCode = '714697';
        $iysCode = '693431';
        
        // test account
        $email = '801eadce-8f51-46d0-bf44-316998040bff';        
        $password = 'S44^L9uZgkm:!3..YKX92zc~<N!3ahZ1';
        
        $this->iys = new Iys\IysApi($apiUri, $iysCode, $iysBrandCode);
        
        // login to iys system
        $login = $this->iys->authentication->loginWithOauth2($email, $password);
        var_dump($login);exit;
        if ($login instanceof \Iys\Auth\Response\Token) {
            $this->iys->setToken($login->getAccessToken());
            $this->iys->setRefreshToken($login->getRefreshToken());
        }
    }

    public function checkEmail( $email ){
        // create a consent
        
        $email = 'presta.tr@gmail.com';
        $date = date('Y-m-d H:i:s');

        $consentModel = $this->iys->consentManagement->generateConsent($email, Iys\ConsentManagement\Enum\ConsentType::EMAIL, Iys\ConsentManagement\Enum\ConsentSource::WEB, Iys\ConsentManagement\Enum\ConsentStatus::APPROVE, $date, Iys\ConsentManagement\Enum\RecipientType::INDIVIDUAL);
        $result = $this->iys->consentManagement->createSingleConsent($consentModel);
        return $result;
    }

    public function checkPhone(){
        // create a consent
        $phoneNumber = '+905415350767';
        $date = date('Y-m-d H:i:s');

        $consentModel = $this->iys->consentManagement->generateConsent($email, Iys\ConsentManagement\Enum\ConsentType::EMAIL, Iys\ConsentManagement\Enum\ConsentSource::WEB, Iys\ConsentManagement\Enum\ConsentStatus::APPROVE, $date, Iys\ConsentManagement\Enum\RecipientType::INDIVIDUAL);
        $result = $this->iys->consentManagement->createSingleConsent($consentModel);
        return $result;
    }

}

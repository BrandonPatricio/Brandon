<?php
require 'config/google-config.php';

if (!isset($_SESSION)) {
    session_start();
}

$google_client = new Google_Client();
$google_client->setClientId(GOOGLE_CLIENT_ID);
$google_client->setClientSecret(GOOGLE_CLIENT_SECRET);
$google_client->setRedirectUri(GOOGLE_REDIRECT_URI);
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        
        $oauth = new Google_Service_Oauth2($google_client);
        $user_info = $oauth->userinfo->get();
        
        $_SESSION['user'] = [
            'id' => $user_info->id,
            'name' => $user_info->name,
            'email' => $user_info->email
        ];
        
        header('Location: productos.php');
        exit();
    }
}

header('Location: index.html');
exit();
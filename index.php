<?php
session_start();

if (!isset($_SESSION["access_token"])) {
    header("Location: YOUR_WEBSITE_URL/login/");
}

$headers = array(
    "Authorization: Bearer ".$_SESSION["access_token"]
);

$ch = curl_init("https://discord.com/api/users/@me");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$userdata = json_decode(curl_exec($ch), true);
echo "Welcome ".$userdata["username"]."!";

?>
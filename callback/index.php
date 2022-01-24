<?php
session_start();

$data = array(
  "client_id" => "YOUR_CLIENT_ID",
  "client_secret" => "YOUR_CLIENT_SECRET",
  "grant_type" => "authorization_code",
  "code" => $_GET["code"],
  "redirect_uri" => "YOUR_WEBSITE_URL/callback/"
);

$ch = curl_init("https://discord.com/api/oauth2/token");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r = json_decode(curl_exec($ch), true);
curl_close($ch);

if (!isset($r["error"])) {
  $_SESSION["access_token"] = $r["access_token"];
  header("Location: #");
}
else {
    header("Location: YOUR_WEBSITE_URL/login/");
}
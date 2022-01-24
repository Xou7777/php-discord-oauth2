<?php
session_start();

unset($_SESSION["login_redirect"]);

if (isset($_GET["callback"])) {
  $_SESSION["login_redirect"] = $_GET["callback"];
}

header("Location: https://discord.com/api/oauth2/authorize?client_id=844235889014210580&redirect_uri=https%3A%2F%2Fnachhilfe-discord.de%2Fcallback%2Fdiscord&response_type=code&scope=identify");

?>
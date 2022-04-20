<?php
session_start();
$_SESSION["title"] = "Заметки";

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/router/routes.php";

<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Routing::get("", "ProjectController");
Routing::get("hub", "ProjectController");
Routing::post("login", "SecurityController");
Routing::post("createAccount", "SecurityController");
Routing::post("addfile", "ProjectController");
Routing::post("search", "ProjectController");
Routing::post("homepage", "ProjectController");
Routing::run($path);
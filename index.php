<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Routing::get("", "ProjectController");
Routing::post("addfile", "ProjectController");
Routing::post("logout", "ProjectController");
Routing::post("search", "ProjectController");
Routing::post("appendFile", "ProjectController");
Routing::post("addGame", "ProjectController");
Routing::post("homepage", "ProjectController");
Routing::get("hub", "ProjectController");
Routing::get("content", "ProjectController");
Routing::get("create", "ProjectController");
Routing::post("login", "SecurityController");
Routing::post("createAccount", "SecurityController");

Routing::run($path);
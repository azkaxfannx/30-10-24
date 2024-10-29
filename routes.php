<?php
// routes.php

require_once 'app/controllers/SponsorController.php';

$controller = new SponsorController();

$url = $_SERVER['REQUEST_URI'];

if ($url == '/sponsor' || $url == '/') {
    $controller->index();
    } elseif ($url == '/sponsor/create') {
        $controller->create();
    } elseif ($url == '/sponsor/store') {
        $controller->store();
    } else {
        echo "404 Not Found";
    }
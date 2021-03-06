<?php
require_once 'autoload.php';

try {
    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
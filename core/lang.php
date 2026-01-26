<?php
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'et';
$allowed = ['et', 'ru'];

if (!in_array($lang, $allowed)) {
    $lang = 'et';
}

$_SESSION['lang'] = $lang;

$t = require __DIR__ . '/../view/lang/' . $lang . '.php';
?>
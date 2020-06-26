<?php

if (!isset($_SESSION)) {
    session_start();
}

?>

<html>

<head>
    <title><?= $data['title'] ?></title>

    <link rel="stylesheet" href="<?= BASEURL ?>css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/style.css">
</head>

<body>
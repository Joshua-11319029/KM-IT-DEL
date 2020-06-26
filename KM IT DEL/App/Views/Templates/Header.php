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

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= BASEURL ?>Home/Index"><b>PANEL WEB | KM IT DEL</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <?php

                if (!isset($_SESSION['role']) || !isset($_SESSION['nama'])) { ?>
                    <li class="nav-item">
                        <a href="<?= BASEURL ?>Home/Login" class="btn btn-success">Login</a>
                    </li>
                <?php
                } else { ?>
                    <li class="nav-item dropdown dropdown-navbar">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if ($_SESSION['role'] == 'administrator') { ?>
                                <i class="fas fa-user-shield mr-2"></i>
                            <?php
                            } else { ?>
                                <i class="fas fa-user-graduate"></i>
                            <?php
                            }
                            ?>
                            <?= $_SESSION['nama'] ?>
                        </a>
                        <div class="dropdown-menu mr-5" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= BASEURL ?>Home/Logout"><i class="fas fa-sign-out-alt mr-2 ml-0"></i>Logout</a>
                    </li>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
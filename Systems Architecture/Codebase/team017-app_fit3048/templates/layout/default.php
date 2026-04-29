<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'IB Australia';
?>
<!DOCTYPE html>
<html>
<head>


    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./webroot/img/favicon.ico">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->css(['normalize.min', 'cake']) ?>
    <?= $this->Html->css(['nucleo-icons.css', 'nucleo-svg.css', 'material-dashboard.css']) ?>


</head>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
     data-scroll="true">
    <div class="container-fluid py-1 px-1">
        <!--Logo in Navbar-->
        <div class="expand navbar-expand mt-sm-0  me-md-8 me-sm-4 responsive" id="navbar responsive">
            <a class="navbar-brand m-0 " href="<?= $this->Url->build('/') ?>">
                <?= $this->Html->image('ibLogoWhite.png', ['alt' => 'main_logo', 'class' => 'responsive', 'style' => 'max-height:30%; max-width:30%']); ?>
                <span class="ms-2 font-weight-bold text-black">IB Australia</span>
            </a>
        </div>
        <ul class="navbar-nav ">
            <li class="nav-item px-3 d-flex align-items-center">
                <!--Current user profile link-->
                <a class="nav-link text-body p-3" href=<?= $this->Url->build('/users/view') ?>>
                    <i class="fa fa-user me-sm-1 fixed-plugin-button-nav cursor-pointer"></i>
                </a>
                <!--logout link-->
                <a class="nav-link text-body p-1 " href=<?= $this->Url->build('/users/logout') ?>>
                    <i class="fa fa-sign-out fixed-plugin-button-nav cursor-pointer icon-appear"></i>
                    <span class="d-sm-inline d-none text-disappear">Log Out</span>
                </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">

            </li>
        </ul>
    </div>
    </div>
    </div>
</nav>
<!-- End Navbar -->

<!--Footer Containing IB Australia information-->
<body>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer class="footer py-4  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class=" mb-lg-0 mb-4">
                <div class="nav nav-footer justify-content-center justify-content-lg-end">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a>, IB Australia</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>


<style>
    .responsive {
        width: 28%;
        height: auto;
    }

    @media screen and (max-width: 480px) {
        .priority1 {
            display: none;
        }

        video {
            width: 30%;
        !important;
        }

    }

    @media screen and (min-width: 481px) {
        h5-big {
            display: none;
        }
    }

    @media screen and (max-width: 575px) {

        .text-disappear {
            display: none;
        }


    }

    @media screen and (min-width: 576px) {
        .icon-appear {
            display: none;
        }

        h5-big {
            display: none;
        }


    }

    @media screen and (max-width: 768px) {
        .priority2 {
            display: none;
        }

        input {
            width: 40%;
            text-align: left;
        }

        h5 {
            padding-left: 55px;
        }

    }

    @media screen and (max-width: 991px) {
        video {
            width: 100%;
        }


    }

    @media screen and (max-width: 1024px) {
        .priority3 {
            display: none;
        }


    }

    @media screen and (max-width: 1200px) {
        .priority4 {
            display: none;
        }

        h5 {

            padding-top: 50px;
            padding-left: 0px;
        }

    }

    .boxed {
        word-break: break-all;
        table-layout: fixed;
        width: 100%;
        word wrap: break-word;
    }
</style>

<script>
    function showpass() {
        document.getElementById('password').type = 'text';
        document.getElementById('showpass').style.display = 'none';
        document.getElementById('hidepass').style.display = 'inline';
    }

    function hidepass() {
        document.getElementById('password').type = 'password';
        document.getElementById('hidepass').style.display = 'none';
        document.getElementById('showpass').style.display = 'inline';
    }
</script>

<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?= base_url() ?>assets/images/apps/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/funkyradio.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/apps.css">
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title><?= $title ?></title>

    <!--    app-->
    <!--    css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/dist/summernote-bs4.css">

    <!--    js-->
    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/js/jquery.steps.js"></script>
    <script src="<?= base_url() ?>assets/js/jQuery.countdownTimer.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script src="<?= base_url() ?>assets/plugins/summernote/dist/summernote-bs4.js"></script>

    <script src="<?= base_url() ?>assets/js/apps/apps.js"></script>


    <!--    template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?= base_url() ?>assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="<?= base_url() ?>assets/css/dashboard.css" rel="stylesheet"/>
    <script src="<?= base_url() ?>assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url() ?>assets/plugins/charts-c3/plugin.css" rel="stylesheet"/>
    <script src="<?= base_url() ?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url() ?>assets/plugins/maps-google/plugin.css" rel="stylesheet"/>
    <script src="<?= base_url() ?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url() ?>assets/plugins/input-mask/plugin.js"></script>

</head>
<body class="">
<div class="page">
    <div class="page-main"
         style="background-image: url(<?= base_url('assets/images/apps/bg.png') ?>) ;background-color: white;">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="<?= base_url() ?>">
                        <i class="fa fa-desktop"></i> &nbsp;Drill and Practice
                    </a>
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown">
                            <a href="#profil" class="nav-link pr-0 leading-none"  title="Profil">
                                <span class="avatar"
                                      style="background-image: url(<?= base_url() ?>assets/upload/images/profil-circle-512.png)"></span>
                                <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?= $this->session->userdata('session_name') ?></span>
                      <small class="text-muted d-block mt-1"><?= $this->session->userdata('session_level') ?></small>
                    </span>
                            </a>
                        </div>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>" onclick="return confirm('Logout? ')" title="Logout?">
                            <i class="fe fe-log-out"></i>
                        </a>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                       data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse" style="background-color: #3aaf4dd4;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 ml-auto">

                    </div>
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row" style="color: white;">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>" class="nav-link"><i class="fe fe-home"></i> Beranda</a>
                            </li>
                            <?php
                            if ($this->session->userdata('session_level') == 'guru'):
                                ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('ujian') ?>" class="nav-link"><i class="fe fe-book"></i> Latihan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('hasil') ?>" class="nav-link"><i class="fe fe-check-square"></i> Hasil</a>
                                </li>
                            <?php
                            elseif ($this->session->userdata('session_level') == 'siswa'):
                                ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('ujian') ?>" class="nav-link"><i class="fe fe-book"></i> Latihan</a>
                                </li>
                            <?php
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 my-md-5">
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title">
                        <?= $page_title ?>
                    </h1>
                </div>
                <div class="row row-cards">

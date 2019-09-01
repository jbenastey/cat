<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/images/apps/favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>CAT Diana</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
</head>
<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <h1>Drill and Practice</h1>
                        <?php if ($this->session->flashdata('alert') == 'failed_login'):?>
                        <div class="alert alert-danger animated fadeInDown hide-it" role="alert">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            Password / NIP NISN Salah. Periksa kembali ..
                        </div>
                        <?php elseif ($this->session->flashdata('alert') == 'success_register'):?>
                            <div class="alert alert-success animated fadeInDown hide-it" role="alert">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                Akun sudah dibuat, silahkan login
                            </div>
                        <?php endif;?>
                    </div>
                    <?=form_open('login',array('class'=>'card'))?>
                        <div class="card-body p-6">
                            <div class="card-title" style="text-align: center;">
                                السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</div>
                            <div class="card-title">Silahkan Login</div>
                            <div class="form-group">
                                <label class="form-label">NIP / NISN</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP / NISN" name="nipnisn" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Password
                                </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="off">
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Belum punya akun? <a href="<?=base_url('register')?>">Buat akun siswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

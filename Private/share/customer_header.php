<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/29/2018
 * Time: 1:26 PM
 */


$page_title = "Chọn suất chiếu"

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url_for('/static/css/bootstrap.min.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo url_for('/static/css/style.css') ?>" type="text/css" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="<?php echo url_for('/static/js/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo url_for('/static/js/searchjs.js') ?>"></script>
    <title><?php echo $page_title ?> </title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="<?php echo url_for("/customer/home.php")?>"> <img class="logo" src="<?php echo url_for("static/img/logo.png") ?>"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                <div class="dropdown">
                    <input id="searchtext" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm phim/Diễn viên" aria-label="Search">
                    <div id="dropdownmenu" class="dropdown-menu">

                    </div>
                </div>

            </div>

            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $session->username; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo url_for("customer/edit_info.php")?>">Thông tin cá nhân</a>
                    <a class="dropdown-item" href="#">Lịch sử xem</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url_for('/controller/logout.php'); ?>">Đăng xuất</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <nav class="nav justify-content-lg-center">
            <a class="nav-link active" href="<?php echo url_for('chooseMovie.php')?>">Đặt vé</a>
            <a class="nav-link" href="<?php echo url_for('movie.php')?>">Phim </a>
            <a class="nav-link" href="#">Khuyến mãi</a>
            <a class="nav-link" href="<?php echo url_for("DSSView.php")?>">Gợi ý suất chiếu</a>
        </nav>
    </div>
</header>

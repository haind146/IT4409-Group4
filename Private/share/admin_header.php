<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/19/2018
 * Time: 4:59 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url_for('/css/bootstrap.min.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo url_for('/css/style.css') ?>" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title><?php echo $page_title ?> </title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="home.php"> <img class="logo" src="../../Public/img/logo.png"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                <form class="form-inline my-2 my-lg-0 ">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm phim/Diễn viên"
                           aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
                </form>

            </div>

            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $session->username; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url_for('/logout.php'); ?>">Đăng xuất</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <nav class="nav justify-content-lg-center">
            <a class="nav-link active" href="schedule.php">Lịch chiếu</a>
            <a class="nav-link" href="movies_management.php">Quản lý phim</a>
            <a class="nav-link" href="#">Khuyến mãi</a>
            <a class="nav-link" href="#">Quản lý thành viên</a>
        </nav>
    </div>
</header>

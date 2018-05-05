
<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/4/2018
 * Time: 9:30 PM
 */

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url_for('static/css/bootstrap.min.css') ?>" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo url_for('static/css/style.css') ?>" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="static/js/jquery.js"></script>
    <script type="text/javascript" src="static/js/searchjs.js"></script>
    <title>Space Cinema</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img class="logo" src="<?php echo url_for("static/img/logo.png")?>">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                <div class="dropdown">
                    <input id="searchtext" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm phim/Diễn viên" aria-label="Search">
                    <div id="dropdownmenu" class="dropdown-menu">

                    </div>
                </div>

            </div>
            <div class="">
                <button class="btn btn-link my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#loginModal">Đăng nhập</button>
                <a class="btn btn-success my-2 my-sm-0" href="<?php echo url_for('registration.php') ?>" type="submit">Đăng ký</a>

                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo url_for("controller/login.php") ?>" method="post">
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="username" name="username"  placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <nav class="nav justify-content-lg-center">
            <a class="nav-link active" href="#">Đặt vé</a>
            <a class="nav-link" href="#">Phim</a>
            <a class="nav-link" href="#">Khuyến mãi</a>
            <a class="nav-link" href="DSSView.php">Gợi ý suất chiếu</a>

        </nav>
    </div>
</header>


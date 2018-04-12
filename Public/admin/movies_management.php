<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/28/2018
 * Time: 2:01 PM
 */
$page_title = 'Quản lý phim';
require_once('../../Private/initialize.php');
include_once(SHARED_PATH . '/admin_header.php');
?>

<main>
    <div class="container">
        <h2 class="text-center" style="margin-top: 1rem;">Quản lý phim</h2>
        <div class="row" style="margin-top: 2em; margin-bottom: 2em">
            <select class="form-control col-3 offset-2">
                <option>Phim đang chiếu</option>
                <option>Phim sắp chiếu</option>
                <option>Tất cả phim</option>
            </select>
            <a class="btn btn-success offset-4" href="">Thêm phim mới</a>
        </div>


        <div id="list-movie" style="margin-top: 1em">
            <div class="row">
                <div class="movie-item col-md-2">
                    <img src="../img/movie1.jpg">
                </div>
                <div class="col-md-6">
                    <h4 style="text-transform: uppercase">tên phim</h4>
                    <b>Trạng thái: </b>
                    <br> <b>Số lượt chiếu: </b>
                </div>
                <div class="col-md-2 offset-2">
                    <a class=" btn btn-outline-info justify-content-end">Xem chi tiết</a>

                </div>

            </div>
        </div>

    </div>
</main>

<?php include_once (SHARED_PATH . "/admin_footer.php");
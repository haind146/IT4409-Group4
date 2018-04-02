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
        <a class="btn btn-outline-danger" href="">Thêm phim mới</a>

        <div id="list-movie" style="margin-top: 1em">

            <div class="movie-item">
                    <img src="../img/movie1.jpg">
                <h5>Tên phim</h5>
            </div>

        </div>
    </div>
</main>

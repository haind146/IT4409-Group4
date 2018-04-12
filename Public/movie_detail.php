<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/4/2018
 * Time: 9:17 PM
 */
require_once ('../Private/initialize.php');
include_once (SHARED_PATH . '/public_header.php');
?>

<main>
    <div class="container" style="margin-top: 5em">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-4 poster-detail">
                        <img src="img/movie1.jpg">

                    </div>
                    <div class="col-sm-8">
                        <h4>TÊN PHIM</h4>
                        <br>
                        <b>Thể loại:</b>
                        <br><b>Đạo diễn:</b>
                        <br><b>Nhà sản xuất:</b>
                        <br><b>diễn viên:</b>
                        <br><b>Thời lượng:</b>
                        <br><b>Đánh giá:</b>
                    </div>
                </div>
                <h4 style="margin-top: 1em;">NỘI DUNG PHIM</h4>
                <p></p>
            </div>
            <div class="col-md-3">
                <h5>CÁC PHIM ĐANG CHIẾU</h5>
                <div class="side-banner">
                    <img src="img/movie3.jpg">
                    <h6>Tên phim</h6>
                </div>


            </div>
        </div>

    </div>
</main>

<?php
    include_once (SHARED_PATH . "/public_footer.php")
?>
<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/4/2018
 * Time: 9:17 PM
 */
require_once ('../Private/initialize.php');
include_once (SHARED_PATH . '/public_header.php');

if($session->role == 'admin') {
    if(isset($_GET['movie_id'])){
        $id = $_GET['movie_id'];
        $movie = Movie::find_by_id();
        $nowShowingMovies = Movie::getNowshowingMovie();
    } else {
        redirect_to(url_for('admin/movies_management.php'));
    }
}

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
                        <h4><?php echo $movie->name ?></h4>
                        <br>
                        <b>Thể loại:</b> <?php echo $movie->genre ?>
                        <br><b>Đạo diễn:</b> <?php echo $movie->director ?>
                        <br><b>Nhà sản xuất:</b> <?php echo $movie->producer ?>
                        <br><b>diễn viên:</b> <?php echo $movie->cast ?>
                        <br><b>Thời lượng:</b> <?php echo $movie->duration . ' phút' ?>
                        <br><b>Đánh giá:</b> <?php echo $movie->rating ?>
                    </div>
                </div>
                <h4 style="margin-top: 1em;">NỘI DUNG PHIM</h4>
                <p><?php echo $movie->description ?></p>
            </div>
            <div class="col-md-3">
                <h5>CÁC PHIM ĐANG CHIẾU</h5>
                <?php foreach ($nowShowingMovies as $nowMovie) { ?>
                <div class="side-banner">
                    <a><img src="img/<?php echo $nowMovie->banner_url ?>"> </a>
                    <h6><?php echo $nowMovie->name ?></h6>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</main>

<?php
    include_once (SHARED_PATH . "/public_footer.php")
?>
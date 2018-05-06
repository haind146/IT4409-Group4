<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/4/2018
 * Time: 9:17 PM
 */
require_once ('../Private/initialize.php');
include_header();


if(isset($_GET['movie_id'])){
    $id = $_GET['movie_id'];
    $movie = Movie::find_by_id($id);
    $nowShowingMovies = Movie::getNowshowingMovie();
} else {
    redirect_to(url_for('index.php'));
}


?>

    <main>
        <div class="container" style="margin-top: 5em">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-4 poster-detail">
                            <img src="static/img/<?php echo $movie->poster_url ?>">

                        </div>
                        <div class="col-sm-8">
                            <h4 style="text-transform: uppercase"><?php echo $movie->name ?></h4>
                            <br>
                            <b>Thể loại:</b> <?php echo $movie->genre ?>
                            <br><b>Đạo diễn:</b> <?php echo $movie->director ?>
                            <br><b>Nhà sản xuất:</b> <?php echo $movie->producer ?>
                            <br><b>diễn viên:</b> <?php echo $movie->cast ?>
                            <br><b>Thời lượng:</b> <?php echo $movie->duration . ' phút' ?>
                            <br><b>Đánh giá:</b> <?php echo $movie->rating ?>
                            <br> <br>
                            <?php if ($session->role === 'admin') { ?>
                            <a class="btn btn-secondary" href="edit_movie.php?movie_id=<?php echo $movie->id ?>" >Chỉnh sửa</a>
                            <a class="btn btn-danger" href="">Xóa</a>
                            <?php } ?>

                        </div>
                    </div>
                    <h4 style="margin-top: 1em;">NỘI DUNG PHIM</h4>
                    <p><?php echo $movie->description ?></p>

                    <h4 style="margin-top: 1em;">LỊCH CHIẾU</h4>
                </div>
                <div class="col-md-3">
                    <h5>CÁC PHIM ĐANG CHIẾU</h5>
                    <?php foreach ($nowShowingMovies as $nowMovie) { ?>
                        <div class="side-banner">
                            <a class="side-banner" href="<?php echo url_for("movie_detail.php?movie_id=". $nowMovie->movie_id)?>"><img src="<?php echo url_for("static/img/") . $nowMovie->banner_url ?>"></a>

                            <h6><?php echo $nowMovie->name ?></h6>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </main>

<?php
if ($session->role == "customer") {
    include_once (SHARED_PATH . "/customer_footer.php");
} else {
    include_once(SHARED_PATH . '/public_footer.php');
}
?>
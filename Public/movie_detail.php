<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/4/2018
 * Time: 9:17 PM
 */
require_once ('../Private/initialize.php');


if(isset($_GET['movie_id'])){
    $id = $_GET['movie_id'];
    $movie = Movie::find_by_id($id);
    $nowShowingMovies = Movie::getNowshowingMovie();

} else {
    redirect_to(url_for('index.php'));
}
if(is_post_request()){
    if(!empty($_POST['star'])){
        $star = $_POST['star'];
        $movie->rate($star);
        $_SESSION[$movie->movie_id] = $star;
    }
}
include_header();


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
                            <br><b>Đánh giá:</b> <?php echo number_format($movie->rating,1) ?>
                            <br> <br>
                            <!-- Button trigger modal -->
                            <?php if (!isset($_SESSION[$movie->movie_id])) { ?>

                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Đánh giá
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="movie_detail.php?movie_id=<?php echo $movie->movie_id?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Đánh giá phim</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="stars">
                                                <input class="star star-5" value="10" id="star-10" type="radio" name="star"  />
                                                <label class="star star-5" for="star-10"></label>
                                                <input class="star star-5" value="9" id="star-9" type="radio" name="star" />
                                                <label class="star star-5" for="star-9"></label>
                                                <input class="star star-5" value="8" id="star-8" type="radio" name="star" />
                                                <label class="star star-5" for="star-8"></label>
                                                <input class="star star-5" value="7" id="star-7" type="radio" name="star" />
                                                <label class="star star-5" for="star-7"></label>
                                                <input class="star star-5" value="6" id="star-6" type="radio" name="star" />
                                                <label class="star star-5" for="star-6"></label>
                                                <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                                                <label class="star star-5" for="star-5"></label>
                                                <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                                                <label class="star star-4" for="star-4"></label>
                                                <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                                                <label class="star star-3" for="star-3"></label>
                                                <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                                                <label class="star star-2" for="star-2"></label>
                                                <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                                                <label class="star star-1" for="star-1"></label>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-warning">Gửi</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
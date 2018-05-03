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

$nowShowingMovies = Movie::getNowshowingMovie();

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
            <a class="btn btn-success offset-3" href="<?php echo url_for("admin/AddFilmView.php")?>">Thêm phim mới</a>
        </div>


        <div id="list-movie" style="margin-top: 1em">
            <?php foreach ($nowShowingMovies as $movie) { ?>
            <div class="row" style="margin-top: 1em;">
                <div class="movie-item col-md-2 offset-1">
                    <img src="../static/img/<?php echo $movie->poster_url ?>">
                </div>
                <div class="col-md-6">
                    <h4 style="text-transform: uppercase"> <?php echo $movie->name ?> </h4>
                    <b>Trạng thái:  </b> <?php echo $movie->status ?>
                    <br> <b>Số lượt chiếu: </b>
                </div>
                <div class="col-md-2 ">
                    <br><br>
                    <div><a class=" btn btn-outline-info justify-content-end" href="movie_detail.php?movie_id=<?php echo $movie->movie_id ?>">Chi tiết</a></div>

                </div>
            </div>
            <?php } ?>


        </div>

    </div>
</main>

<?php include_once (SHARED_PATH . "/admin_footer.php");
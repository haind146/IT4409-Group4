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
require_admin_login();


$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = Movie::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);



$sql = "SELECT * FROM movie ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$movies = Movie::find_by_sql($sql);


?>

<main id="main">
    <div class="container">
        <h3 class="text-center" style="margin-top: 1rem; text-transform: uppercase">Quản lý phim</h3>
        <div class="row" style="margin-top: 2em; margin-bottom: 2em">
            <select onchange="loadMovies(this.value)" class="form-control col-3 offset-2">
                <option value="all">Tất cả phim</option>
                <option value="now">Phim đang chiếu</option>
                <option value="comming">Phim sắp chiếu</option>

            </select>
            <a class="btn btn-success offset-3" href="<?php echo url_for("admin/AddFilmView.php")?>">Thêm phim mới</a>
        </div>


        <div id="list-movie" style="margin-top: 1em">
            <?php foreach ($movies as $movie) { ?>
            <div class="row" style="margin-top: 1em;">
                <div class="movie-item col-md-2 offset-1">
                    <img src="../static/img/<?php echo $movie->poster_url ?>">
                </div>
                <div class="col-md-6">
                    <h4 style="text-transform: uppercase"> <?php echo $movie->name ?> </h4>
                    <b>Trạng thái:  </b> <?php echo $movie->status ?>
                    <br> <b>Số lượt chiếu: </b> <?php echo $movie->count_schedule() ?>
                    <br> <b>Doanh thu: </b> <?php echo money_format($movie->get_revenue()) ?>
                </div>
                <div class="col-md-2 ">
                    <br><br>
                    <div><a class=" btn btn-outline-info justify-content-end" href="movie_detail.php?movie_id=<?php echo $movie->movie_id ?>">Chi tiết</a></div>

                </div>
            </div>
            <?php } ?>
            <div class="container">
            <?php
            $url = url_for('/admin/movies_management.php');
            echo $pagination->page_links($url);
            ?>
            </div>
        </div>

    </div>
</main>

<?php include_once (SHARED_PATH . "/admin_footer.php");
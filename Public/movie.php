<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 5/5/2018
 * Time: 9:28 PM
 */
require_once('../Private/initialize.php');
include_header();
$nowShowingMovies = Movie::getNowshowingMovie();
$commingSoon = Movie::getCoomingSoonMovie();

?>

    <main>
        <div class="container">
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                       aria-controls="pills-home" aria-selected="true">Phim đang chiếu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                       aria-controls="pills-profile" aria-selected="false">Phim sắp chiếu</a>
                </li>

            </ul>


            <div class="tab-content " id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <?php foreach ($nowShowingMovies as $movie) { ?>
                        <div class="col-3">
                            <a class=" movie-img" href="<?php echo url_for('movie_detail.php?movie_id=') . $movie->movie_id?>"><img src="<?php echo url_for('static/img/') . $movie->poster_url?>"></a>
                            <h6 style="text-transform: uppercase"><?php echo $movie->name ?></h6>
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <?php foreach ($commingSoon as $movie) { ?>
                            <div class="col-3">
                                <a class=" movie-img" href="<?php echo url_for('movie_detail.php?movie_id=') . $movie->movie_id?>"><img src="<?php echo url_for('static/img/') . $movie->poster_url?>"></a>
                                <h6 style="text-transform: uppercase"><?php echo $movie->name ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

    </main>

<?php include_footer() ?>
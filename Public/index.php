
<?php require_once ('../Private/initialize.php');

?>

<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/20/2018
 * Time: 3:47 PM
 */

$page_title = 'HOME';
include_header();
$nowShowingMovie = Movie::getNowshowingMovie();
$commingSoon = Movie::getCoomingSoonMovie();


?>


<main>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php $i = 1 ; for ($i;$i<count($nowShowingMovie);$i++) { ?>

                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 " src="static/img/movie1.jpg ?>" alt="First slide">
            </div>
            <?php foreach ($nowShowingMovie as $movie ) { ?>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="static/img/<?php echo $movie->banner_url ?>" alt="First slide">
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- phim đang chiếu/phim sắp chiếu -->
    <div class="container" style="margin-top: 3rem;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">PHIM ĐANG CHIẾU</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">PHIM SẮP CHIẾU</a>
            </div>
        </nav>
        <div class="tab-content" style="margin-top: 2rem;" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container">
                    <div class="row ">
                        <?php $i=0; foreach ($nowShowingMovie as $movie ) { ?>
                            <div class="col-md-4">
                                <a href="<?php echo url_for("movie_detail.php?movie_id=") . $movie->movie_id ?>" class="list-movie"><img src="static/img/<?php echo $movie->banner_url ?>"></a>
                                <h6 style="text-transform: uppercase" ><?php echo $movie->name ?></h6>
                            </div>

                            <?php if(++$i > 5) break;} ?>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container">
                    <div class="row ">
                        <?php $i=0; foreach ($commingSoon as $movie ) { ?>
                            <div class="col-md-4">
                                <a href="<?php echo url_for("movie_detail.php?movie_id=") . $movie->movie_id ?>" class="list-movie"><img src="static/img/<?php echo $movie->banner_url ?>"></a>
                                <h6 style="text-transform: uppercase" ><?php echo $movie->name ?></h6>
                            </div>

                            <?php if(++$i > 5) break;} ?>
                    </div>

                </div>
            </div>

        </div>
    </div>


</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

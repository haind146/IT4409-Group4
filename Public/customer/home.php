
<?php require_once ('../../Private/initialize.php');

?>

<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/20/2018
 * Time: 3:47 PM
 */

$page_title = 'HOME';
include_once (SHARED_PATH . "/customer_header.php");
$nowShowingMovie = Movie::getNowshowingMovie();


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
                <img class="d-block w-100 " src="../static/img/movie1.jpg ?>" alt="First slide">
            </div>
            <?php foreach ($nowShowingMovie as $movie ) { ?>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="../static/img/<?php echo $movie->banner_url ?>" alt="First slide">
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
                                <a href="<?php echo url_for("movie_detail.php?movie_id=") . $movie->movie_id ?>" class="list-movie"><img src="../static/img/<?php echo $movie->banner_url ?>"></a>
                                <h6 style="text-transform: uppercase" ><?php echo $movie->name ?></h6>
                            </div>

                            <?php if(++$i > 5) break;} ?>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row ">
                    <div class="col">
                        <a href="#" class="list-movie"><img src="img/movie1.jpg"></a>
                        <h6 >Tên phim</h6>
                    </div>
                    <div class="col list-movie">
                        <img src="img/movie2.jpg">
                    </div>
                    <div class="col list-movie">
                        <img src="img/movie3.jpg">
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <a href="#" class="list-movie"><img src="img/movie1.jpg"></a>
                        <h6 >Tên phim</h6>
                    </div>
                    <div class="col list-movie">
                        <img src="img/movie2.jpg">
                    </div>
                    <div class="col list-movie">
                        <img src="img/movie3.jpg">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container" style="margin-top: 3rem">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#by-day" role="tab" aria-controls="home" aria-selected="true">MUA VÉ THEO NGÀY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#by-movie" role="tab" aria-controls="profile" aria-selected="false">MUA VÉ THEO PHIM</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ticket-by-day" role="tabpanel" aria-labelledby="home-tab">...</div>
                    <div class="tab-pane fade" id="by-movie" role="tabpanel" aria-labelledby="profile-tab">...</div>

                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</main>

<?php include(SHARED_PATH . '/customer_footer.php'); ?>

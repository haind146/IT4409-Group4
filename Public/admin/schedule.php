<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/16/2018
 * Time: 8:04 PM
 */
require_once ('../../Private/initialize.php');
$page_title = 'Lập lịch chiếu';
include_once (SHARED_PATH . '/admin_header.php');

$nowShowingMovie = Movie::getNowshowingMovie();
?>

<main>
    <div class="container">
        <h2 class="text-center" style="text-transform: uppercase;">Lập lịch chiếu phim</h2>
        <div class="form-group form-inline justify-content-center">
               <label>Chọn ngày: &nbsp </label>
               <input class="form-control" type="text" id="datepicker" onchange="getScheduleByDate(this)"><b>&nbsp</b>
                <button class="btn btn-success" onclick="getSchedule()">Cập nhật</button>
        </div>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Thời gian</th>
                <th scope="col">Rạp 1</th>
                <th scope="col">Rạp 2</th>
                <th scope="col">Rạp 3</th>
                <th scope="col">Rạp 4</th>
                <th scope="col">Rạp 5</th>
                <th scope="col">Rạp 6</th>
            </tr>
            </thead>
            <tbody>
            <?php $id=0; $min = 0; $hour = 10; ;for($min;$hour < 24; $min+=20) { ?>
            <tr>
                <th scope="row"><?php
                if($min == 60) {$min = 0; ++$hour;};
                $time = $hour . ':';
                if($min == 0) {$time.='00';} else $time.=$min;
                echo $time;
                ?></th>
                <td onclick="addMovie(this)" id="<?php echo $id; $id++  ?>"><i class="material-icons">add</i></td>
                <td onclick="addMovie(this)" id="<?php echo $id ; $id++ ?>"><i class="material-icons">add</i></td>
                <td onclick="addMovie(this)" id="<?php echo $id ; $id++ ?>"><i class="material-icons">add</i></td>
                <td onclick="addMovie(this)" id="<?php echo $id ; $id++ ?>"><i class="material-icons">add</i></td>
                <td onclick="addMovie(this)" id="<?php echo $id ; $id++ ?>"><i class="material-icons">add</i></td>
                <td onclick="addMovie(this)" id="<?php echo $id ; $id++ ?>"><i class="material-icons">add</i></td>
            </tr>
            <?php ; } ?>

            </tbody>
        </table>
        <div class="row justify-content-center fixed-bottom choose-movie" id="choose-movie" style="display: none">

            <?php foreach ($nowShowingMovie as $movie) { ?>
            <div class="banner-popover" onclick="chooseMovie(this)" style="margin-bottom: 1em">
                <img src="../img/<?php echo $movie->banner_url ?>">
                <h6 style="text-transform: uppercase"><?php echo $movie->name ?></h6>
                <a><?php echo $movie->duration; ?></a><a>&nbsp phút</a>
            </div>
            <?php } ?>

        </div
    </div>

</main>

<?php include_once (SHARED_PATH . '/admin_footer.php')?>
<script>
    $('#datepicker').datepicker({ calendarWeeks: true, uiLibrary: 'bootstrap4' });
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/16/2018
 * Time: 8:04 PM
 */
require_once ('../../Private/initialize.php');
if(isset($_GET['date'])){
    header("Content-Type: application/json; charset=UTF-8");
    $date = $_GET['date'];
    $schedules = Schedule::find_schedule_by_date($date);
    die(json_encode($schedules));
}

if(is_post_request()) {
    if(!empty($_POST['json_schedule'])) {
       $newSchedule = json_decode($_POST['json_schedule'],true);

       foreach ($newSchedule as $scd) {
           $newScd = new Schedule($scd);
           $newScd->save();
           $newScd->generate_ticket();
       }
       redirect_to(url_for("/admin/schedule.php"));

    }
}

$page_title = 'Lập lịch chiếu';
include_once (SHARED_PATH . '/admin_header.php');

$nowShowingMovie = Movie::getNowshowingMovie();




?>

<main>
    <div class="container">
        <h2 class="text-center" style="text-transform: uppercase;">Lập lịch chiếu phim</h2>
        <div class="form-group form-inline justify-content-center">
            <form method="post" action="schedule.php" class="form-inline" >

                <input style="display: none" type="text" id="json_schedule" name="json_schedule">
               <label>Chọn ngày: &nbsp </label>
               <input class="form-control" type="text" id="datepicker" onchange="getScheduleByDate(this)" readonly>  <b>&nbsp</b>

                <button class="btn btn-success" type="submit">Cập nhật</button>
            </form>
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
<!--                <td onclick="addMovie(this)" id="--><?php //echo $id; $id++  ?><!--"><i class="material-icons">add</i></td>-->
                <td  id="<?php echo $id; $id++  ?>"></td>
                <td  id="<?php echo $id ; $id++ ?>"></td>
                <td  id="<?php echo $id ; $id++ ?>"></td>
                <td  id="<?php echo $id ; $id++ ?>"></td>
                <td  id="<?php echo $id ; $id++ ?>"></td>
                <td  id="<?php echo $id ; $id++ ?>"></td>
            </tr>
            <?php ; } ?>

            </tbody>
        </table>
        <div class="row justify-content-center fixed-bottom choose-movie" id="choose-movie" style="display: none">

            <?php foreach ($nowShowingMovie as $movie) { ?>
            <div class="banner-popover" onclick="chooseMovie(this)" style="margin-bottom: 1em" id="movie<?php echo $movie->movie_id?>">
                <img src="../img/<?php echo $movie->banner_url ?>">
                <h6 style="text-transform: uppercase"><?php echo $movie->name ?></h6>
                <a><?php echo $movie->duration; ?>&nbsp phút</a>
            </div>
            <?php } ?>

        </div>
    </div>
    <div id="test"></div>
</main>

<?php include_once (SHARED_PATH . '/admin_footer.php')?>
<script>
    $('#datepicker').datepicker({ calendarWeeks: true, uiLibrary: 'bootstrap4' });
</script>

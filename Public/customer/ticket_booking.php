<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/26/2018
 * Time: 9:06 PM
 */
require_once ("../../Private/initialize.php");

if (is_get_request()) {
    if(isset($_GET['schedule_id'])){
        $schedule = Schedule::find_by_id($_GET['schedule_id']);



    }
$page_title = "Chọn vé";

}

include_once (SHARED_PATH . "/customer_header.php")
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 style="text-transform: uppercase" class="text-center">Chọn vé</h4>

                <form action="ticket_booking.php" method="post">
                    <div class="form-group">
                        <label>Chọn số vé:</label>
                        <input type="number" class="form-control" placeholder="Number of ticket" min="1" max="10">
                    </div>
                    <div class="form-group">
                        <label >Vị trí:</label>
                        <input type="text" class="form-control" disabled>
                    </div>

                    <button class="btn btn-success" >Đặt vé</button>

                </form>
            </div>

            <div class="col-md-8">
                <h4 style="text-transform: uppercase;" class="text-center">sơ đồ rạp chiếu</h4>
                <br>
                <h6 class="text-center" style="border-bottom: 1px solid #1e5736;">MÀN HÌNH</h6> <br><br>
                <div class="container-fluid room-map">
                    <a>&#65&#49</a>

                </div>

            </div>
        </div>
    </div>


</main>



<?php include_once (SHARED_PATH . "/customer_footer.php")?>


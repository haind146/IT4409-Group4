<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 4/26/2018
 * Time: 9:06 PM
 */
require_once("../../Private/initialize.php");
require_member_login();
if (is_get_request()) {
    if (isset($_GET['schedule_id'])) {
        $schedule = Schedule::find_by_id($_GET['schedule_id']);
        $movie = Movie::find_by_id($schedule->movie_id);
        $room = Room::find_by_id($schedule->room_id);
        $tickets = Ticket::find_by_schedule($schedule->schedule_id);
    }
    $page_title = "Chọn vé";

}

if(is_post_request()) {
    if (!empty($_POST['schedule_id'])){
        $schedule_id = $_POST['schedule_id'];
        $list_ticket = explode(",",$_POST['list_ticket']);
        foreach ($list_ticket as $seat_no) {
            if(Ticket::find_ticket($schedule_id,$seat_no)) {
                $ticket = Ticket::find_ticket($schedule_id, $seat_no);
                $ticket->set_booked();
                $ticket->set_customer($session->getUserId());
                $ticket->setID();
                $ticket->save();

            }

        }
        redirect_to(url_for("customer/success.php"));

    }
}

include_once(SHARED_PATH . "/customer_header.php")
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 style="text-transform: uppercase" class="text-center">Chọn vé</h4>

                <form action="ticket_booking.php" method="post">

                    <input name="schedule_id" style="display: none" value="<?php echo $schedule->schedule_id?>">
                    <input type="text" class="form-control" id="list_ticket" name="list_ticket" style="display: none" >

                    <div class="form-group">
                        <label>Vị trí:</label>
                        <input type="text" class="form-control" id="list-ticket"  disabled >
                    </div>
                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Loại vé</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Standard</td>
                            <td id="standard" onchange="calculateAmount(this)">0</td>
                            <td id="ticket_price"><?php echo $movie->ticket_price ?></td>
                        </tr>
                        <tr>
                            <td>VIP</td>
                            <td id="vip" onchange="calculateAmount(this)">0</td>
                            <td><?php echo $movie->ticket_price*1.5?></td>
                        </tr>
                        <tr>
                            <th>Tổng</th>
                            <td></td>
                            <td id="amount"></td>
                        </tr>

                        </tbody>
                    </table>

                    <button class="btn btn-success">Đặt vé</button>
                    <br><br><br>

                </form>
                <div>
                    <b>Suất chiếu:&nbsp</b> <a><?php echo $movie->name ?></a> <br>
                    <b>Thời gian:&nbsp</b> <a><?php echo $schedule->start_time ?></a> <br>
                    <b>Phòng chiếu:&nbsp</b> <a><?php echo $room->name ?></a> <br>

                </div>
            </div>

            <div class="col-md-8">
                <h4 style="text-transform: uppercase;" class="text-center">sơ đồ rạp chiếu</h4>
                <br>
                <h6 class="text-center" style="border-bottom: 1px solid #1e5736;">MÀN HÌNH</h6> <br><br>
                <div class="container-fluid">

                    <?php
                    $i = 0;
                    echo "<div class='room-map d-flex justify-content-around'>";
                    foreach ($tickets as $ticket) {
                        $i++;
                        if ($ticket->status == 0) {
                            echo "<a class='p-sm-1 unavailable' >" . $ticket->seat_no . "</a>";
                        } elseif ($ticket->price == 1.5 * $movie->ticket_price) {
                            echo "<a class='p-sm-1 vip' onclick='chooseSeat(this)' >" . $ticket->seat_no . "</a>";
                        } else {
                            echo "<a class='p-sm-1 standard' onclick='chooseSeat(this)'>" . $ticket->seat_no . "</a>";
                        }
                        if ($i % 15 == 0) {
                            echo "</div><div class='room-map d-flex justify-content-around'>";
                        }

                    }
                    ?>


                </div>

            </div>
        </div>
    </div>


</main>


<?php include_once(SHARED_PATH . "/customer_footer.php") ?>


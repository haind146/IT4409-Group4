<?php
/**
 * Created by PhpStorm.
 * User: Nguyễn Bá Khải
 * Date: 4/30/2018
 * Time: 9:24 PM
 */
require_once("../Private/initialize.php");
$sql = "SELECT DISTINCT producer FROM movie WHERE 1";
$result = $database->query($sql);



include_header();

?>
<script type="text/javascript" src="static/js/dss.js"></script>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label>Tên phim</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="date1" value= <?php echo date('Y-m-d'); ?>>
                            </div>
                            <div class="form-group col-6">
                                <label>Ngày kết thúc</label>
                                <input type="date" class="form-control" id="date2">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Thời gian bắt đầu</label>
                                <input type="time" id="time1" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Thời gian kết thúc</label>
                                <input type="time" id="time2" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="time">
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Giá thấp nhất</label>
                                <input type="number" class="form-control" id="minprice">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Giá cao nhất</label>
                                <input type="number" class="form-control" id="maxprice">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="price">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Thể loại</label> <br>
                                <input type="checkbox" name="genre[]" value="Kinh dị"> Kinh dị
                                <input type="checkbox" name="genre[]" value="Hài"> Hài
                                <input type="checkbox" name="genre[]" value="Hành động"> Hành động
                                <input type="checkbox" name="genre[]" value="Tình cảm"> Tình cảm
                                <input type="checkbox" name="genre[]" value="Tâm lý"> Tâm lý
                                <input type="checkbox" name="genre[]" value="Hoạt hình"> Hoạt hình
                                <input type="checkbox" name="genre[]" value="Thần thoại"> Thần thoại
                                <input type="checkbox" name="genre[]" value="Khoa học viễn tưởng"> Khoa học viễn tưởng
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="gen">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Nhà sản xuất</label> <br>
                                <?php while ($row = $result->fetch_array()){
                                    echo '<input type="checkbox" name="producer[]" value="' . $row[0] . '">'.$row[0] . '<br>';
                                } ?>


                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="pro">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Điểm rating</label>
                                <input type="text" class="form-control" id="rating">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="rate">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Ghế muốn ngồi</label>
                                <input type="text" class="form-control" id="seatno">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" id="seat">
                            </div>
                        </div>



                        <input class="btn btn-success" type="submit" value="submit" id="button">



                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã suất chiếu</th>
                            <th scope="col">Phim</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Nhà sản xuất</th>
                            <th scope="col">Nhà sản xuất</th>
                            <th scope="col">Ghế</th>
                            <th scope="col">Giá vé</th>
                            <th scope="col">Đặt vé</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </main>

<?php include_footer(); ?>
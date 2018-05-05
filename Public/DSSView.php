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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="controller/DSSController.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="date1" value= <?php echo date('Y-m-d'); ?>>
                            </div>
                            <div class="form-group col-6">
                                <label>Ngày kết thúc</label>
                                <input type="date" class="form-control" name="date2">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Thời gian bắt đầu</label>
                                <input type="time" name="time1" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Thời gian kết thúc</label>
                                <input type="time" name="time2" class="form-control">
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Giá thấp nhất</label>
                                <input type="number" class="form-control" name="minprice">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Giá cao nhất</label>
                                <input type="number" class="form-control" name="maxprice">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Thể loại</label> <br>
                                <input type="checkbox" name="genre[]" value="Kinh dị"> Kinh dị
                                <input type="checkbox" name="genre[]" value="Hài"> Hài
                                <input type="checkbox" name="genre[]" value="Hành động"> Hành động
                                <input type="checkbox" name="genre[]" value="Tình cảm"> Tình cảm
                                <input type="checkbox" name="genre[]" value="Hoạt hình"> Hoạt hình
                                <input type="checkbox" name="genre[]" value="Thần thoại"> Thần thoại
                                <input type="checkbox" name="genre[]" value="Khoa học viễn tưởng"> Khoa học viễn tưởng
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Nhà sản xuất</label> <br>
                                <input type="checkbox" name="producer[]" value="VTC"> VTC
                                <input type="checkbox" name="producer[]" value="Marvel"> Marvel
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Điểm rating</label>
                                <input type="text" class="form-control" name="rating">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-8">
                                <label>Ghế muốn ngồi</label>
                                <input type="text" class="form-control" name="seatno">
                            </div>
                            <div class="form-group col-4">
                                <label>Độ quan trọng</label>
                                <input type="number" class="form-control" min="1" max="10" name="minprice">
                            </div>
                        </div>



                        <input class="btn btn-success" type="submit" value="submit">


                    </form>
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
                            <th scope="col">Ghế</th>
                            <th scope="col">Giá vé</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>1</td>
                            <td>Infinity War</td>
                            <td>2018-05-05 14:00:00</td>
                            <td>Hành động</td>
                            <td>MAVEL</td>
                            <td>F4</td>
                            <td>50000</td>
                            <td><a href="#">Đặt vé</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </main>

<?php include_footer(); ?>
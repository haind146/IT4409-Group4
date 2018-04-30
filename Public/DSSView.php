<?php
/**
 * Created by PhpStorm.
 * User: Nguyễn Bá Khải
 * Date: 4/30/2018
 * Time: 9:24 PM
 */
?>
<html>
<body>
<form action="../Private/controller/DSSController.php" method="post">
    Ngày bắt đầu<input type="date" name="date1" value = <?php echo date('Y-m-d'); ?>>
    Ngày kết thúc<input type="date" name="date2">
    Thời gian bắt đầu<input type="time" name="time1">
    Thời gian kết thúc<input type="time" name="time2">
    Min price<input type="number" name="minprice">
    Max price<input type="number" name="maxprice">
    Thể loại<input type="checkbox" name="genre[]" value="Kinh dị"> Kinh dị
    <input type="checkbox" name="genre[]" value="Hài"> Hài
    Nhà sản suất<input type="checkbox" name="producer[]" value="VTC"> VTC
    <input type="checkbox" name="producer[]" value="Marvel"> Marvel
    Điểm rating<input type="text" name="rating">
    Ghê muốn ngồi<input type="text" name="seatno">
    Chỉ số quan trọng về giá <input type="number" name="price">
    Chỉ số quan trọng về thời gian <input type="number" name="time">
    Chỉ số quan trọng về thể loại <input type="number" name="gen">
    Chỉ số quan trọng về rating <input type="number" name="rate">
    Chỉ số quan trọng về ghể <input type="number" name="seat">
    Chỉ số quan trọng về nhà sản suất <input type="number" name="pro">
    <input type="submit" value="submit">


</form>
</body>

</html>

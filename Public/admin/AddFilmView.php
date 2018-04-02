<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Thêm phim</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script type="javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
    <script type="javascript" src="../js/action.js"></script>
</head>
<body>

<form class="">
     <center>
<div class="border border-dark col-md-5">
    <div>
        <h1 class="text-center">Thêm phim mới</h1>
    </div>
    <div align="left">
        <div class="form-group">
            <label class="col-4">Tên phim: </label>
            <input class="col-sm-7" type="text" placeholder="Tên phim" name="name">
        </div>
        <div class="form-group">
            <label class="col-4">Thể loại: </label>
            <select class="col-sm-7" name="genre">
                <option value="Kinh dị">Kinh dị</option>
                <option value="Khoa học viễn tưởng">Khoa học viễn tưởng</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-4">Đạo diễn: </label>
            <input class="col-sm-7" type="text" placeholder="Đạo diễn" name="director">
        </div>
        <div class="form-group">
            <label class="col-4">Nhà sản xuất: </label>
            <input class="col-sm-7" type="text" placeholder="Nhà sản xuất" name="producer">
        </div>
        <div class="form-group">
            <label class="col-4">Các diễn viên:</label>
            <input class="col-sm-7" type="text" placeholder="Các diễn viên" name="cast">
        </div>
        <div class="form-group">
            <label class="col-4">Thời lượng (phút): </label>
            <input class="col-sm-7"  type="number" placeholder="Thời lượng" name="duration">
        </div>
        <div class="form-group">
            <label class="col-4">Ngày phát hành: </label>
            <input class="col-sm-7" type="date" placeholder="Ngày phát hành" name="release_date">
        </div>
        <div class="form-group">
            <label class="col-4" >Mô tả: </label>
            <input class="col-sm-7" type="text" placeholder="Mô tả" name="description">
        </div>
        <div class="form-group">
            <label class="col-4">Poster: </label>
            <input  type="file" placeholder="Poster" name="poster_url">
        </div>
        <div class="form-group">
            <label class="col-4">Banner: </label>
            <input type="file" placeholder="Poster" name="banner_url">
        </div>
        <div class="form-group">
            <button>Submit</button>
        </div>
    </div>
</div>

 </center>
</form>
</body>
</html>
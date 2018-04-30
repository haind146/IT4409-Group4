<?php require_once('../../Private/initialize.php');

?>

<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/20/2018
 * Time: 3:47 PM
 */

$page_title = 'HOME';
include_once('../../private/share/admin_header.php');
//    require_admin_login();

if(is_post_request()){
    $movie_arr = [];
    $movie_arr = $_POST['movie'];
    if ($_FILES['movie']['error']['poster_url']>0||$_FILES['movie']['error']['banner_url']>0)
    {
        echo 'Ảnh Upload Bị Lỗi'. $_FILES['movie']['error']['poster_url'];
    }
    else{
        $temp = explode(".", $_FILES["movie"]["name"]["poster_url"]);
        $poster_url = 'poster' . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["movie"]["tmp_name"]['poster_url'], "../img/" . $poster_url);

        $temp = explode(".", $_FILES["movie"]["name"]["banner_url"]);
        $banner_url = 'banner' . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["movie"]["tmp_name"]['banner_url'], "../img/" . $banner_url);

        $movie_arr['poster_url'] = $poster_url;
        $movie_arr['banner_url'] = $banner_url;

        $new_movie = new Movie($movie_arr);
        $new_movie->save();

        redirect_to(url_for("admin/movies_management.php"));
    }
}
?>

<body>

<form action="" method="post" enctype="multipart/form-data">

    <div class="container">
        <div>
            <h1 class="text-center">Thêm phim mới</h1>
        </div>
        <div align="left">
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Tên phim: </label>

                <input class="form-control col-sm-7" type="text" placeholder="Tên phim" name="movie[name]" required>

            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Thể loại: </label>

                <select class="form-control col-sm-7" name="movie[genre]">
                    <option value="Kinh dị">Kinh dị</option>
                    <option value="Khoa học viễn tưởng">Khoa học viễn tưởng</option>
                    <option value="Hành động">Hành động</option>
                    <option value="Hài">Hài</option>
                    <option value="Tình cảm">Tình cảm</option>
                    <option value="Hoạt hình">Hoạt hình</option>
                    <option value="Thần thoại">Thần thoại</option>
                    <option value="Tâm lý">Tâm lý</option>

                </select>

            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Đạo diễn: </label>
                <input class="col-sm-7 form-control" type="text" placeholder="Đạo diễn" name="movie[director]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Nhà sản xuất: </label>
                <input class="col-sm-7 form-control" type="text" placeholder="Nhà sản xuất" name="movie[producer]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Các diễn viên:</label>
                <input class="col-sm-7 form-control" type="text" placeholder="Các diễn viên" name="movie[cast]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Thời lượng (phút): </label>
                <input class="col-sm-7 form-control" type="number" placeholder="Thời lượng" name="movie[duration]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Điểm đánh giá </label>
                <input class="col-sm-7 form-control" type="number" placeholder="Rating" name="movie[rating]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Ngày phát hành: </label>
                <input class="col-sm-7 form-control" type="date" placeholder="Ngày phát hành" name="movie[release_date]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Trạng thái: </label>
                <select class="form-control col-sm-7" name="movie[status]">
                    <option >Sắp chiếu</option>
                    <option >Đang chiếu</option>
                    <option >Ngừng chiếu</option>
                </select>
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Mô tả: </label>
                <input class="col-sm-7 form-control" type="text" placeholder="Mô tả" name="movie[description]">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Giá vé cơ bản: </label>
                <input class="col-sm-7 form-control" type="number" placeholder="Giá vé" name="movie[ticket_price]" min="0">
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Poster: </label>
                <input type="file" placeholder="Poster" name="movie[poster_url]" accept="image/gif, image/jpeg, image/png" required>
            </div>
            <div class="form-group row">
                <label class="offset-2 col-md-2 col-form-label">Banner: </label>
                <input type="file" placeholder="Poster" name="movie[banner_url]" accept="image/gif, image/jpeg, image/png, image/jpg" required>
            </div>
            <div class="form-group row">
                <button class="btn btn-success offset-4" type="submit">Submit</button>
            </div>
        </div>
    </div>

</form>
<?php include_once (SHARED_PATH . '/admin_footer.php');
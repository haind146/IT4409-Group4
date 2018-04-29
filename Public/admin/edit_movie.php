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
if (!isset($_GET['movie_id'])) {
    redirect_to(url_for('admin/movie_management.php'));
}

$id = $_GET['movie_id'];
$movie = Movie::find_by_id($id);



if (is_post_request()) {
    $movie_arr = [];
    $movie_arr = $_POST['movie'];

    if (isset($_FILES['movie']['poster_url'])) {
        if ($_FILES['movie']['error']['poster_url'] > 0) {
            echo 'Ảnh Upload Bị Lỗi' . $_FILES['movie']['error']['poster_url'];
        } else {
            $temp = explode(".", $_FILES["movie"]["name"]["poster_url"]);
            $poster_url = 'poster' . round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["movie"]["tmp_name"]['poster_url'], "../img/" . $poster_url);

            $movie_arr['poster_url'] = $poster_url;
        }
    }
    if (isset($_FILES['movie']['banner_url'])) {
        if ($_FILES['movie']['error']['banner_url'] > 0) {
            echo 'Ảnh Upload Bị Lỗi' . $_FILES['movie']['error']['banner_url'];
        } else {
            $temp = explode(".", $_FILES["movie"]["name"]["banner_url"]);
            $banner_url = 'banner' . round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["movie"]["tmp_name"]['banner_url'], "../img/" . $banner_url);

            $movie_arr['banner_url'] = $banner_url;

        }
    }


    $movie->merge_attributes($movie_arr);
    $movie->save();
//    redirect_to(url_for('/admin/movie_detail.php?movie_id=' . $movie->movie_id));

}
?>

    <body>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="container">
            <div>
                <h1 class="text-center">Chỉnh sửa phim</h1>
            </div>
            <div align="left">
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Tên phim: </label>

                    <input class="form-control col-sm-7" type="text" placeholder="Tên phim" name="movie[name]" value="<?php echo $movie->name ?>" required>

                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Thể loại: </label>

                    <select class="form-control col-sm-7" name="movie[genre]" value="<?php echo $movie->genre ?>" >
                        <option value="Kinh dị" <?php if($movie->genre === 'Kinh dị') echo 'selected' ?>>Kinh dị</option>
                        <option value="Khoa học viễn tưởng" <?php if($movie->genre === 'Khoa học viễn tưởng') echo 'selected' ?>>Khoa học viễn tưởng</option>
                        <option value="Hành động" <?php if($movie->genre === 'Hành động') echo 'selected' ?>>Hành động</option>
                        <option value="Hài" <?php if($movie->genre === 'Hài') echo 'selected' ?>>Hài</option>
                        <option value="Tình cảm" <?php if($movie->genre === 'Tình cảm') echo 'selected' ?>>Tình cảm</option>
                        <option value="Hoạt hình" <?php if($movie->genre === 'Hoạt hình') echo 'selected' ?>>Hoạt hình</option>
                        <option value="Thần thoại" <?php if($movie->genre === 'Thần thoại') echo 'selected' ?>>Thần thoại</option>
                        <option value="Tâm lý" <?php if($movie->genre === 'Tâm lý') echo 'selected' ?>>Tâm lý</option>

                    </select>

                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Đạo diễn: </label>
                    <input class="col-sm-7 form-control" type="text" placeholder="Đạo diễn" name="movie[director]" value="<?php echo $movie->director ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Nhà sản xuất: </label>
                    <input class="col-sm-7 form-control" type="text" placeholder="Nhà sản xuất" name="movie[producer]" value="<?php echo $movie->producer ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Các diễn viên:</label>
                    <input class="col-sm-7 form-control" type="text" placeholder="Các diễn viên" name="movie[cast]" value="<?php echo $movie->cast ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Thời lượng (phút): </label>
                    <input class="col-sm-7 form-control" type="number" placeholder="Thời lượng" name="movie[duration]" value="<?php echo $movie->duration ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Điểm đánh giá </label>
                    <input class="col-sm-7 form-control" type="number" placeholder="Rating" name="movie[rating]" value="<?php echo $movie->rating ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Ngày phát hành: </label>
                    <input class="col-sm-7 form-control" type="date" placeholder="Ngày phát hành"
                           name="movie[release_date]" value="<?php echo $movie->release_date ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Trạng thái: </label>
                    <select class="form-control col-sm-7" name="movie[status]"">
                        <option value="Sắp chiếu" <?php if($movie->status === 'Sắp chiếu') echo 'selected' ?> >Sắp chiếu</option>
                        <option value="Đang chiếu" <?php if($movie->status === 'Đang chiếu') echo 'selected' ?> >Đang chiếu</option>
                        <option value="Ngừng chiếu" <?php if($movie->status === 'Ngừng chiếu') echo 'selected' ?> >Ngừng chiếu </option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Mô tả: </label>
                    <input class="col-sm-7 form-control" type="text" placeholder="Mô tả" name="movie[description]" value="<?php echo $movie->description ?>">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Poster: </label>
                    <input type="file" placeholder="Poster" name="movie[poster_url]"
                           accept="image/gif, image/jpeg, image/png">
                </div>
                <div class="form-group row">
                    <label class="offset-2 col-md-2 col-form-label">Banner: </label>
                    <input type="file" placeholder="Poster" name="movie[banner_url]"
                           accept="image/gif, image/jpeg, image/png, image/jpg">
                </div>
                <div class="form-group row">
                    <button class="btn btn-success offset-4" type="submit">Submit</button>
                </div>
            </div>
        </div>

    </form>
<?php include_once(SHARED_PATH . '/admin_footer.php');
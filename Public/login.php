<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 5/2/2018
 * Time: 9:19 PM
 */

require_once ("../Private/initialize.php");
include_once (SHARED_PATH . "/public_header.php")
?>

<main>
    <div class="container" style="margin-top: 4em;">
        <div class="row">
            <form action="<?php echo url_for("controller/login.php")?>" method="post" class="offset-4 col-md-4">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control <?php if($session->message()=="login denied") echo "is-invalid" ?>" name="username" placeholder="Username">
                    <?php if($session->message()=="login denied") echo "<div class='invalid-feedback'>Sai tên đăng nhập hoặc mật khẩu</div>"?>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</main>

<?php
    include_once (SHARED_PATH . "/public_footer.php");
    $session->clear_message();
?>
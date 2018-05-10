<?php

require_once ("../../Private/initialize.php");
require_member_login();
$user = User::find_by_username($session->username);

if(is_post_request()){
    if(!empty($_POST['user'])){
        $user->merge_attributes($_POST['user']);
        $user->save();
        die($database->error);
    }
}

include_header();

?>

<main>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 style="margin-left: 2em;">THÔNG TIN CÁ NHÂN</h4>
                <div class="row">
                    <div class="">
                        <form action="<?php echo url_for('customer/edit_info.php'); ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Họ</label>
                                    <input type="text" class="form-control" value="<?php echo $user->firstname ?>" placeholder="Firstname" name="user[firstname]" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tên</label>
                                    <input type="text" class="form-control" placeholder="Lastname" value="<?php echo $user->lastname ?>" name="user[lastname]">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control"  value="<?php echo $user->username ?>" placeholder="Username" name="user[username]" disabled>
                                    <div class="invalid-feedback" id="username-invalid">Tên đăng nhập đã tồn tại</div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Địa chỉ Email</label>
                                    <input type="Email" class="form-control" value="<?php echo $user->email ?>" disabled placeholder="Email" name="user[email]">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Số điện thoại</label>
                                    <input type="number" class="form-control" value="<?php echo $user->phonenumber ?>" placeholder="Phone number" name="user[phonenumber]">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ngày sinh</label>
                                    <input type="Date" class="form-control" value="<?php echo $user->date_of_birth ?>" placeholder="Birthday" name="user[date_of_birth]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Địa chỉ</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?php echo $user->address ?>" placeholder="1234 Main St" name="user[address]">
                            </div>


                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">LỊCH SỬ XEM</h4><br>
                <b>Tổng thanh toán:&nbsp</b> <a><?php echo money_format($user->get_total_puchase()) ?></a> <br>
                <b>Xếp hạng thành viên:&nbsp</b> <a>KIM CƯƠNG</a> <br>
            </div>
        </div>

    </div>
</main>
 <?php include_footer() ?>
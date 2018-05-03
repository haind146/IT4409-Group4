<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/28/2018
 * Time: 10:46 PM
 */
require_once ('../Private/initialize.php');
    if(is_get_request()){
        if(isset($_GET['username'])){
            $username = $_GET['username'];
            if(User::find_by_username($username)){
                die ('1');
            }else {
                die('0');
            }
        }
    }

    if (is_post_request()) {
        $user_arr = $_POST['user'];
        $user = new User($user_arr);
        $user->role = 'member';
        $user->create();
        redirect_to(url_for('success.php'));
    }

    include_once (SHARED_PATH . "/public_header.php");
?>



	<main>


		<div class="container">
			<h3 class="text-center">Đăng ký thành viên</h3>
			<div class="row">
				<div class="col-md-8 offset-2">
					<form action="<?php echo url_for('registration.php'); ?>" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label >Họ</label>
								<input type="text" class="form-control"  placeholder="Firstname" name="user[firstname]" required>
							</div>
							<div class="form-group col-md-6">
								<label>Tên</label>
								<input type="text" class="form-control" placeholder="Lastname" name="user[lastname]">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Tên đăng nhập</label>
								<input type="text" class="form-control"  placeholder="Username" name="user[username]" onchange="checkUsername(this)" required>
								<div class="invalid-feedback" id="username-invalid">Tên đăng nhập đã tồn tại</div>
							</div>
							<div class="form-group col-md-8">
								<label>Địa chỉ Email</label>
								<input type="Email" class="form-control" placeholder="Email" name="user[email]">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Mật khẩu</label>
								<input type="password" class="form-control"  placeholder="Password" name="user[password]" id="pass" required>
							</div>
							<div class="form-group col-md-6">
								<label>Nhập lại mật khẩu</label>
								<input type="password" class="form-control" placeholder="Re-enter password" onchange="checkPassword(this)" required>
                                <div class="invalid-feedback">Mật khẩu nhập lại không trùng khớp</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Số điện thoại</label>
								<input type="number" class="form-control"  placeholder="Phone number" name="user[phonenumber]">
							</div>
							<div class="form-group col-md-6">
								<label>Ngày sinh</label>
								<input type="Date" class="form-control" placeholder="Birthday" name="user[date_of_birth]">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAddress">Địa chỉ</label>
							<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="user[address]">
						</div>
					
						
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">
									Tôi đồng ý với các <a href="">điều khoản và dịch vụ</a>
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-success">Đăng ký</button>
					</form>
				</div>
			</div>
		</div>
	</main>


<?php include_once ('../Private/share/public_footer.php');
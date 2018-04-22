<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/28/2018
 * Time: 10:46 PM
 */
require_once ('../Private/initialize.php');

    if (is_post_request()) {
        $user_arr = $_POST['user'];
        $user = new User($user_arr);
        $user->role = 'member';
        $user->create();
        redirect_to(url_for('success.php'));
    }
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Space Cinema</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<img class="logo" src="img/logo.png">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

					<form class="form-inline my-2 my-lg-0 ">
						<input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm phim/Diễn viên" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
					</form>

				</div>
				<div class="">
					<button class="btn btn-link my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#loginModal">Đăng nhập</button>
					<!-- <button class="btn btn-success my-2 my-sm-0" type="submit">Đăng ký</button> -->

					<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="index.php" method="post">
										<div class="form-group">
											<label for="username">Tên đăng nhập</label>
											<input type="text" class="form-control" id="username" name="username"  placeholder="Username">
										</div>
										<div class="form-group">
											<label for="password">Mật khẩu</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Password">
										</div>

										<button type="submit" class="btn btn-success">Submit</button>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<nav class="nav justify-content-lg-center">
				<a class="nav-link active" href="#">Lịch chiếu</a>
				<a class="nav-link" href="#">Phim đang chiếu</a>
				<a class="nav-link" href="#">Phim sắp chiếu</a>
				<a class="nav-link" href="#">Khuyến mãi</a>
				<a class="nav-link" href="#">Thành viên</a>
				<a class="nav-link" href="#">Gợi ý suất chiếu</a>

			</nav>
		</div>
	</header>




	<main>


		<div class="container">
			<h3 class="text-center">Đăng ký thành viên</h3>
			<div class="row">
				<div class="col-md-10 offset-1">
					<form action="<?php echo url_for('registration.php'); ?>" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label >Họ</label>
								<input type="text" class="form-control"  placeholder="Firstname" name="user[firstname]">
							</div>
							<div class="form-group col-md-6">
								<label>Tên</label>
								<input type="text" class="form-control" placeholder="Lastname" name="user[lastname]">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Tên đăng nhập</label>
								<input type="text" class="form-control"  placeholder="Username" name="user[username]" onkeyup="checkUsername(this.value)">
								<div class="invalid-feedback" id="username-invalid"></div>
							</div>
							<div class="form-group col-md-8">
								<label>Địa chỉ Email</label>
								<input type="Email" class="form-control" placeholder="Email" name="user[email]">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Mật khẩu</label>
								<input type="password" class="form-control"  placeholder="Password" name="user[password]">
							</div>
							<div class="form-group col-md-6">
								<label>Nhập lại mật khẩu</label>
								<input type="password" class="form-control" placeholder="Re-enter password">
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
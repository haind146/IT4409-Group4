<?php
    require_once('../Private/initialize.php');

    if($session->is_logged_in() && $session->role === 'admin'){
        redirect_to(url_for('/admin/home.php'));
    }


    if(is_post_request()) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = User::find_by_username($username);

        if ($user != false && $user->verify_password($password)){
            global $session;
            $session->login($user);
            redirect_to(url_for('/admin/home.php'));

        }
        else {
            redirect_to(url_for('/index.php'));
        }
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
          <a class="btn btn-success my-2 my-sm-0" href="<?php echo url_for('registration.php') ?>" type="submit">Đăng ký</a>

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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 " src="img/movie1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/movie2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/movie3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- phim đang chiếu/phim sắp chiếu -->
    <div class="container" style="margin-top: 3rem;">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">PHIM ĐANG CHIẾU</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">PHIM SẮP CHIẾU</a>
        </div>
      </nav>
      <div class="tab-content" style="margin-top: 2rem;" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="container">
            <div class="row ">
              <div class="col">
                <a href="#" class="list-movie"><img src="img/movie1.jpg"></a>
                <h6 >Tên phim</h6>
              </div>
              <div class="col list-movie">
                <img src="img/movie2.jpg">
              </div>
              <div class="col list-movie">
                <img src="img/movie3.jpg">
              </div>
            </div>
            <div class="row ">
              <div class="col">
                <a href="#" class="list-movie"><img src="img/movie4.jpg"></a>
                <h6 >Tên phim</h6>
              </div>
              <div class="col list-movie">
                <img src="img/movie5.jpg">
              </div>
              <div class="col list-movie">
                <img src="img/movie6.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="row ">
            <div class="col">
              <a href="#" class="list-movie"><img src="img/movie1.jpg"></a>
              <h6 >Tên phim</h6>
            </div>
            <div class="col list-movie">
              <img src="img/movie2.jpg">
            </div>
            <div class="col list-movie">
              <img src="img/movie3.jpg">
            </div>
          </div>
          <div class="row ">
            <div class="col">
              <a href="#" class="list-movie"><img src="img/movie1.jpg"></a>
              <h6 >Tên phim</h6>
            </div>
            <div class="col list-movie">
              <img src="img/movie2.jpg">
            </div>
            <div class="col list-movie">
              <img src="img/movie3.jpg">
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <div class="container" style="margin-top: 3rem">
      <div class="row">
        <div class="col">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#by-day" role="tab" aria-controls="home" aria-selected="true">MUA VÉ THEO NGÀY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#by-movie" role="tab" aria-controls="profile" aria-selected="false">MUA VÉ THEO PHIM</a>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="ticket-by-day" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="by-movie" role="tabpanel" aria-labelledby="profile-tab">...</div>
            
          </div>
        </div>
        <div class="col">

        </div>
      </div>
    </div>
  </main>

  <footer>

  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>`
  <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
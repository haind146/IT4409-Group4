<?php
    require_once('../Private/initialize.php');


?>

<!doctype html>
<html lang="en">
<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="static/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/css/style.css">
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
  

    
    
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="">
                  <div class="card " style="margin-top:0; background-color: orange">
                    <h4 class="text-center" >Chọn phim</h4>
                  </div>
                  <ul id="result" class="list-group" >
                  </ul>
                </div>
                <div class="col-md-6">
                  <div class="card " style="margin-top:0; background-color: orange">
                    <h4 class="text-center">Chọn suất</h4>
                  </div>
                  <ul id="schedule"></ul>
                </div>    
            </div>
        </div>
    </div>
    
    
    
  

  <footer>

  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="static/js/jquery-3.3.1.slim.min.js"></script>`
  <script src="static/js/bootstrap.bundle.js"></script>
  <script language="javascript" type="text/javascript" src="static/js/jquery-1.6.2.min.js"></script>
  <script language="javascript" type="text/javascript" src="static/js/ajax.js"></script>
</body>
</html>
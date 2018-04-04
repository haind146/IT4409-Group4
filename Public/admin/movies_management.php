<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/28/2018
 * Time: 2:01 PM
 */
$page_title = 'Quản lý phim';
require_once('../../Private/initialize.php');
include_once(SHARED_PATH . '/admin_header.php');
?>


    <main>
      <div class="container">
          <h2 class="text-center" style="margin-top: 1rem;">Quản lý phim</h2>
          <a class="btn btn-outline-danger" href="">Thêm phim mới</a>
  
          <div id="list-movie" style="margin-top: 1em">
  
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/movie6.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Tên phim</h5>
                    <p class="card-text">Mô tả</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ngày đăng</li>
                    <li class="list-group-item">Trạng thái</li>
                    <li class="list-group-item">Rate?</li>
                  </ul>
                  <div class="btn-group card-body" role="group" aria-label="none">
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button type="button" class="btn btn-secondary">Del</button>
                  </div>
                </div>
              </div>
             
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/movie6.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Tên phim</h5>
                    <p class="card-text">Mô tả</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ngày đăng</li>
                    <li class="list-group-item">Trạng thái</li>
                    <li class="list-group-item">Rate?</li>
                  </ul>
                  <div class="btn-group card-body" role="group" aria-label="none">
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button type="button" class="btn btn-secondary">Del</button>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/movie6.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Tên phim</h5>
                    <p class="card-text">Mô tả</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ngày đăng</li>
                    <li class="list-group-item">Trạng thái</li>
                    <li class="list-group-item">Rate?</li>
                  </ul>
                  <div class="btn-group card-body" role="group" aria-label="none">
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button type="button" class="btn btn-secondary">Del</button>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
      </div>
  </main>

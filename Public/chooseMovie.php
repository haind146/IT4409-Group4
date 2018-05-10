<?php
    require_once('../Private/initialize.php');
    include_header();
?>



    
    
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

  <script src="static/js/bootstrap.bundle.js"></script>
  <script language="javascript" type="text/javascript" src="static/js/jquery-1.6.2.min.js"></script>
  <script language="javascript" type="text/javascript" src="static/js/ajax.js"></script>
</body>
</html>


$(document).ready(function() {
   
    // $("#ajaxButton").click(function() {
        $.ajax({
              type: 'POST',
              url: '../getData/jsonMovie.php',
              dataType: 'json',
              success: function(data) {
                var result = '<ul>'
                  for (var i in data){
                      result = result 
                      +'<div class="movie" style="margin-top:0" ><img style="margin-left:20px;margin-top:21px;float:left" class="img-rounded" width="70" height="50" alt="Cinque Terre" src="img/'
                      +data[i]['poster_url']
                      +'"> <div id="'
                      +data[i]['id']
                      +'" class="title-movie" style="text-align: left;padding-top:25px;padding-left:100px">'
                      + data[i]['name']+'</div></div>';
                  }
                 
                  result = result + "</ul>"
                  $("#result").html(result);
               
              }
        });
        
    $(".movie").live('click',function(event) { 

         var myClass = this.className;
        $('.movie').css('background', 'white');
        $('.movie').css('color', 'black');
        $(this).css('background', 'orange');
        $(this).css('color', 'red');
        
        var text = $(this).children("div").attr("id");
        $.ajax({  
            type: 'GET',
            url: 'getData/jsonSchedule.php', 
            data: { name: text },
            success: function(response) {
                
                var weekday = new Array(7);
                weekday[0] = "Chủ nhật";
                weekday[1] = "Thứ hai";
                weekday[2] = "Thứ ba";
                weekday[3] = "Thứ tư";
                weekday[4] = "Thứ năm";
                weekday[5] = "Thứ sáu";
                weekday[6] = "Thứ bảy";
                var result = '<ul>';
                for (var i in response){
                var datetime=response[i]['start_time'];
                var myTime = datetime.substr(11, 2);
                var dayofWeek=weekday[new Date(datetime).getDay()];
                var dayofWeek= dayofWeek+",  "+datetime.toString().substr(0,10);
                var time= new Date(datetime).toString().substr(17,4);        
              
                result=result 
                +'<div class="schedule"><li style="padding-left:35%;padding-top:10px">'
                +dayofWeek+'</li><div style="margin-top:10px;width:40px;height:30px;padding-left:45%"><a style="padding:5px;border: 1px ridge;" href="">'
                +time
                +'</a></div></div>';
                }
                result = result + "</ul>";
                $("#schedule").html(result);
            }
        });
    });

    $(".schedule").live('click',function(event) { 
        var myClass = this.className;
       $('.schedule').css('background', 'white');
       $('.schedule').css('color', 'black');
       $(this).css('background', 'yellow');
       $(this).css('color', 'red');
       
       var text = $(this).children("div").attr("id")
    }); 
});
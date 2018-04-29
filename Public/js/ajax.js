$(document).ready(function() {
   
    // $("#ajaxButton").click(function() {
        $.ajax({
              type: 'POST',
              url: 'getData/jsonMovie.php',
              dataType: 'json',
              success: function(data) {
                var result = '<ul>'
                  for (var i in data){
                      result = result+'<div style="height:90px" class="border" style="margin-top:0" ><img style="margin-left:20px;margin-top:21px;float:left" class="img-rounded" width="70" height="50" alt="Cinque Terre" src="img/'+data[i]['poster_url']
                      +'"> <div id="'+data[i]['id']+'" class="title-movie" style="text-align: left;padding-top:25px;padding-left:100px">' + data[i]['name']+'</div></div>';
                  }
                 
                  result = result + "</ul>"
                  $("#result").html(result);
               
              }
        });
        
    $(".border").live('click',function(event) { 

         var myClass = this.className;
        $('.border').css('background', 'white');
        $('.border').css('color', 'black');
        $(this).css('background', 'yellow');
        $(this).css('color', 'red');
        
        var text = $(this).children("div").attr("id")
        // $(this).text();
        $.ajax({  
            type: 'GET',
            url: 'getData/jsonSchedule.php', 
            data: { name: text },
            success: function(response) {
                alert(response);
                var result = '<ul>';
                result=result+'<liv>'+response[0]['name']+'</li><br><liv>'+response[0]['room_id']+'</li><br><liv>'+response[0]['start_time']+'</li>';
                result = result + "</ul>";
                $("#schedule").html(result);
            }
        });
    });
    
        
});
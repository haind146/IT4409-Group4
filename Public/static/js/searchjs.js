$(document).ready(function () {

    $("#searchtext").on('input',function () {
        console.log("change");
        var text = $("#searchtext").val().trim();
        if(text!=null&&text!=""){
            var postdata = {
                text: text
            }
            $.post("http://localhost/IT4409-Group4/Public/controller/SearchController.php", postdata, function (data, status){
                $("#dropdownmenu").empty();
                var jsondata = JSON.parse(data);
                console.log(data);
                if(jsondata.length==0||$("#searchtext").val()==""){
                    $("#dropdownmenu").hide();
                    console.log("hide");
                }
                else{
                    for( var json in jsondata){
                        $("#dropdownmenu").append('<a href="movie_detail.php?movie_id='+jsondata[json]['movie_id']+'" class="dropdown-item">'+'<img width="50px" height="50px" style="object-fit: cover" src="http://localhost/IT4409-Group4/Public/static/img/'+jsondata[json]['banner_url']+'"/>'+jsondata[json]['name']+'</a>');
                    }
                    $("#dropdownmenu").show();
                }
            });
        } else {
            $("#dropdownmenu").hide();
        }
    });
});
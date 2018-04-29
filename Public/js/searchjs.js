$(document).ready(function () {
    $("#searchbutton").click(function () {

    });
    $("#searchtext").on('input',function () {
        console.log("change");
        var text = $("#searchtext").val().trim();
        if(text!=null&&text!=""){
            var postdata = {
                text: text
            }
            $.post("../Private/controller/SearchController.php", postdata, function (data, status){
                $("#dropdownmenu").empty();
                var jsondata = JSON.parse(data);
                console.log(data);
                if(jsondata.length==0||$("#searchtext").val()==""){
                    $("#dropdownmenu").hide();
                    console.log("hide");
                }
                else{
                    for( var json in jsondata){
                        $("#dropdownmenu").append('<a href="movie_detail.php?movie_id='+jsondata[json]['id']+'" class="dropdown-item">'+jsondata[json]['name']+'<img width="50px" height="50px" src="img/'+jsondata[json]['banner_url']+'"/></a>');
                    }
                    $("#dropdownmenu").show();
                }
            });
        }
    });
});
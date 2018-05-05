$(document).ready(function () {
    var send = function () {
        var postdata ={
            name:$("#name").val(),
            date1: $("#date1").val(),
            date2: $("#date2").val(),
            time1:$("#time1").val(),
            time2:$("#time2").val(),
            time:$("#time").val(),
            minprice:$("#minprice").val(),
            maxprice:$("#maxprice").val(),
            price:$("#price").val(),
            genre: $("input[name='genre[]']:checked")
                .map(function(){return $(this).val();}).get(),
            gen:$("#gen").val(),
            producer:$("input[name='producer[]']:checked")
                .map(function(){return $(this).val();}).get(),
            pro:$("#pro").val(),
            rating:$("#rating").val(),
            rate:$("#rate").val(),
            seatno:$("#seatno").val(),
            seat:$("#seat").val()
        };
        console.log(postdata)
        $.post("../Public/controller/DSSController.php",postdata,function (data,status) {
            console.log(data);
            var jsonarray= JSON.parse(data);
            $("#tbody").empty();
            for(i in jsonarray) {
                $("#tbody").append('<tr>' +
                    '<td>'+jsonarray[i]['id']+'</td>' +
                    '<td>'+jsonarray[i]['schedule_id']+'</td>' +
                    '<td>'+jsonarray[i]['movie_name']+'</td>' +
                    '<td>'+jsonarray[i]['start_time']+' ('+jsonarray[i]['duration']+' phút)'+'</td>' +
                    '<td>'+jsonarray[i]['genre']+'</td>' +
                    '<td>'+jsonarray[i]['producer']+'</td>' +
                    '<td>'+jsonarray[i]['seat_no']+'</td>' +
                    '<td>'+jsonarray[i]['price']+'</td>' +
                    '<td><a href="customer/ticket_booking.php?schedule_id='+jsonarray[i]['price']+'">Đặt vé</a></td>' +
                    '</tr>');
            }
        });
    };
    $("#button").click(function () {
        send();
    });

});
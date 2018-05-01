var ticketArr = [];
var ticket_price = document.getElementById("ticket_price").innerHTML;

function chooseSeat(seat) {
    if(seat.classList.contains('vip')){
        document.getElementById("vip").innerHTML++;
    } else document.getElementById("standard").innerHTML++;
    seat.style.color = "red";
    seat.style.border = "1px solid red";
    ticketArr.push(seat.innerHTML);
    seat.setAttribute("onclick","unChooseSeat(this)");
    document.getElementById("list-ticket").value = ticketArr.join();
    document.getElementById("list_ticket").value = ticketArr.join();
    calculateAmount();
}

function unChooseSeat(seat) {
    if(seat.classList.contains('vip')){
        document.getElementById("vip").innerHTML--;
    } else document.getElementById("standard").innerHTML--;
    seat.style.color = "black";
    seat.style.border = "1px solid green";
    for(var i =0; i<ticketArr.length;i++) {
        if(ticketArr[i]===seat.innerHTML) ticketArr.splice(i,1)
    }

    seat.setAttribute("onclick","chooseSeat(this)");
    document.getElementById("list-ticket").value = ticketArr.join();
    document.getElementById("list_ticket").value = ticketArr.join();
    calculateAmount();
}

function calculateAmount() {
    var vip = document.getElementById("vip").innerHTML;
    var standard = document.getElementById("standard").innerHTML;
    var amount = parseFloat(ticket_price)*parseFloat(standard) + parseFloat(ticket_price)*parseFloat(vip)*1.5;
    document.getElementById("amount").innerHTML = amount.toString();

}
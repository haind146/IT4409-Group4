
var cellIndex;
var scheduleArr = Array;

function schedule(movie_name, movie_id, room_id, start_time) {
    this.movie_name = movie_name;
    this.movie_id = movie_id;
    this.room_id = room_id;
    this.start_time = start_time;
}

function movie(id, movie_name, duration) {
    this.id = id;
    this.movie_name = name;
    this.duration = duration;
}

function addMovie(id) {
    id.style.backgroundColor = "green";
    document.getElementById("choose-movie").removeAttribute("style");
    cellIndex = parseInt(id.id);
}

function chooseMovie(movie) {
    var k = cellIndex;
    var movieName = movie.firstElementChild.nextElementSibling.innerHTML;
    var duration = parseInt(movie.firstElementChild.nextElementSibling.nextElementSibling.innerHTML);
    var movieId =
    for(var i=0;i<duration;i+=20){
        if(document.getElementById(k).firstElementChild === null) {alert("Không thể xếp lịch chiếu trong khung giờ này"); document.getElementById(cellIndex).style.backgroundColor = "#efebdb";document.getElementById("choose-movie").style.display = "none"; return}
        else {k+=6}
    }
    k = cellIndex;
    document.getElementById(cellIndex).innerHTML = "<a class='btn btn-link'>XÓA</a>";

    document.getElementById(cellIndex + 6).innerHTML = movieName;
    document.getElementById(cellIndex + 12).innerHTML = duration + " phút";
    for( i = 0; i<duration; i+=20){
        document.getElementById(k).style.backgroundColor = "#4f6859";
        document.getElementById(k).removeAttribute("onclick");
        k +=6;
    }
    document.getElementById(cellIndex).setAttribute("onclick","removeSchedule(this)");
    document.getElementById(cellIndex).style.backgroundColor = "#a84c57";
    document.getElementById("choose-movie").style.display = "none";
}

function removeSchedule(id) {
    cellIndex = parseInt(id.id);
    var k =cellIndex;
    var duration = parseInt(document.getElementById(cellIndex+12).innerHTML);
    for(var i = 0; i<duration; i+=20){
        document.getElementById(k).style.backgroundColor = "#efebdb";
        document.getElementById(k).setAttribute("onclick","addMovie(this)");
        document.getElementById(k).innerHTML = "<i class=\"material-icons\">add</i>";
        k +=6;
    }
}

function getScheduleByDate(element) {
    var date = element.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            alert(myObj);
        }
    };
    xmlhttp.open("GET", "schedule_api.php?date="+date, true);
    xmlhttp.send();
}
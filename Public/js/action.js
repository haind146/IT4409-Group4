
var cellIndex;
var scheduleArr = [];

function scheduleObj(movie_id, room_id, start_time) {
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
    for(var i=0;i<duration;i+=20){
        if(document.getElementById(k)===null || document.getElementById(k).firstElementChild === null||document.getElementById(k).firstElementChild.innerHTML ==="XÓA") {alert("Không thể xếp lịch chiếu trong khung giờ này"); document.getElementById(cellIndex).style.backgroundColor = "#efebdb";document.getElementById("choose-movie").style.display = "none"; return}
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

    var movie_id = movie.getAttribute("id").slice(5);
    var start_time = reformat_date(document.getElementById("datepicker").value) + " " + document.getElementById(cellIndex).parentElement.firstElementChild.innerHTML + ":00";
    var room_id = cellIndex%6 +1;

    var schedule = new scheduleObj(movie_id,room_id,start_time);
    scheduleArr.push(schedule);
    document.getElementById("json_schedule").value = JSON.stringify(scheduleArr);

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

    var start_time =  document.getElementById(cellIndex).parentElement.firstElementChild.innerHTML + ":00"
    start_time = reformat_date(document.getElementById("datepicker").value) + " " +start_time;
    for (i=0;i<scheduleArr.length;i++){
        if (scheduleArr[i].start_time == start_time && scheduleArr[i].room_id == cellIndex%6+1 ) {
            scheduleArr.splice(i,1);
        }
    }
    document.getElementById("json_schedule").value = JSON.stringify(scheduleArr);

}

function getScheduleByDate(element) {
    var date = element.value;
    var xmlhttp = new XMLHttpRequest();
    scheduleArr.splice(0,scheduleArr.length);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var scheduleArr = JSON.parse(this.responseText);
            set_table();
            for(j = 0; j<scheduleArr.length;j++){


                cellIndex = find_cell_id(scheduleArr[j].start_time,scheduleArr[j].room_id);
                var movie = document.getElementById("movie"+scheduleArr[j].movie_id);
                var movieName = movie.firstElementChild.nextElementSibling.innerHTML;
                var duration = parseInt(movie.firstElementChild.nextElementSibling.nextElementSibling.innerHTML);


                document.getElementById(cellIndex ).innerHTML = movieName;
                document.getElementById(cellIndex + 6).innerHTML = duration + " phút";
                var k = cellIndex;
                for( i = 0; i<duration; i+=20){
                    document.getElementById(k).style.backgroundColor = "#4f6859";
                    document.getElementById(k).removeAttribute("onclick");
                    k +=6;
                }

            }

        }
    };
    xmlhttp.open("GET", "schedule.php?date="+reformat_date(date), true);
    xmlhttp.send();
}

function reformat_date(date) {
    dates = date.split('/');
    return dates[2]+"/"+dates[0]+"/"+dates[1];

}

function find_cell_id(start_time,room_id) {
    var times = start_time.substr(11,15).split(":");
    var hour = parseInt(times[0]);
    var min = parseInt(times[1]);
    return ((hour-10)*3+(min/20))*6 + parseInt(room_id) -1;
}

function set_table() {
    for(i= 0;i<258;i++){
        var cell = document.getElementById(i);
        cell.setAttribute("onclick","addMovie(this)");
        cell.innerHTML = '<i class="material-icons">add</i>';
        cell.style.backgroundColor = "#efebdb";
    }
}

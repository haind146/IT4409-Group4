function checkUsername(input) {
    var username = input.value;
    var xhttp;
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1){
                input.className = "is-invalid form-control"
            } else
                input.className = "is-valid form-control"
        }
    };
    xhttp.open("GET", "registration.php?username=" + username, true);
    xhttp.send();
}

function checkPassword(input) {
    var reTypePass = input.value;
    var pass = document.getElementById("pass").value;
    if(reTypePass===pass) {
        input.className = "form-control is-valid";
    }else {
        input.className = "form-control is-invalid";
    }
}
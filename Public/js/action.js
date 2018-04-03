function checkUsername(str) {
  if (str.length==0) { 
    document.getElementById("username-invalid").innerHTML="";
    document.getElementById("username-invalid").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if (this.responseText === 1) {
          document.getElementById("username-invalid").innerHTML="Tên đăng nhập đã tồn tại";
      }
      
    }
  }
  xmlhttp.open("GET","username_validation.php?username="+str,true);
  xmlhttp.send();
}
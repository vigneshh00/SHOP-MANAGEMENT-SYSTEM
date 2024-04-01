function myshow(){
    var pass = document.getElementById("pass");
    var eye1 = document.getElementById("eye1");
    var eye2 = document.getElementById("eye2");
    if (x.type === "password") {
        x.type = "text";
        eye1.style.display="block";
        eye2.style.display="none";
    }else{
        x.type = "password";
        eye2.style.display="block";
        eye1.style.display="none";
    }
}
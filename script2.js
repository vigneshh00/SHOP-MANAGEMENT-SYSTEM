function myshow(){
    var x = document.getElementById("myInput1");
    var z = document.getElementById("eye1");
    var a = document.getElementById("eye2");
    if (x.type === "password") {
        x.type = "text";
        z.style.display="block";
        a.style.display="none";
    }else{
        x.type = "password";
        a.style.display="block";
        z.style.display="none";
    }
}
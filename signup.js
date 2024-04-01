function myshow1(){
    var pass = document.getElementById("pass");
    var eye1 = document.getElementById("eye1");
    var eye2 = document.getElementById("eye2");
    if (pass.type === "password") {
        pass.type = "text";
        eye1.style.display="block";
        eye2.style.display="none";
    }else{
        pass.type = "password";
        eye2.style.display="block";
        eye1.style.display="none";
    }
}
function myshow2(){
    var cn_pass = document.getElementById("cn_pass");
    var eye3 = document.getElementById("eye3");
    var eye4 = document.getElementById("eye4");
    if (cn_pass.type === "password") {
        cn_pass.type = "cn_passt";
        eye3.style.display="block";
        eye4.style.display="none";
    }else{
        cn_pass.type = "password";
        eye4.style.display="block";
        eye3.style.display="none";
    }
}
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
    var confirm_password = document.getElementById("confirm_password");
    var eye3 = document.getElementById("eye3");
    var eye4 = document.getElementById("eye4");
    if (confirm_password.type === "password") {
        confirm_password.type = "text";
        eye3.style.display="block";
        eye4.style.display="none";
    }else{
        confirm_password.type = "password";
        eye4.style.display="block";
        eye3.style.display="none";
    }
}

function validateForm(){
    const forms= document.forms[0];

    let uname = forms.elements[5].value;
    let email = forms.elements[6].value;
    let pass = forms.elements[7].value;
    let cn_pass = forms.elements[8].value;


    if (uname.length < 3) {
        alert("Username must contain atleast 3 characters!");
        return false;
    }
    if(uname.length > 20){
        alert("Username can only contain a maximum of 20 characters!");
        return false;
    }
    if (!/^[a-zA-Z0-9_]+$/.test(uname)) {
        alert("Username is invalid!");
        return false;
    }

    if(!/\S+@\S+\.\S+/.test(email)){
        alert("Email is not valid!");
        return false;
    }
    if (pass.length < 8) {
        alert("Password must contain atleast 8 characters!");
        return false;
    }    
    if (!/[A-Z]/.test(pass)) {
        alert("Password must contain atleast one uppercase letter!");
        return false;
    }
    if (!/[a-z]/.test(pass)) {
        alert("Password must contain atleast one lowercase letter!");
        return false;
    }
    if (!/\d/.test(pass)) {
        alert("Password must contain atleast one digit!");
        return false;
    }
    if (!/[$@!%*?&]/.test(pass)) {
        alert("Password must contain atleast one special character (!$@!%*?&)");
        return false;
    }
    if(pass != cn_pass){
        alert("Passwords does not match!");
        return false;
    }
    return true;

}
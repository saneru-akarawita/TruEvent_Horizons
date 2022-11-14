const pwdInputBox = document.getElementById("pwd-field")
const showPwdIcon = document.getElementById("show-pwd");
const hidePwdIcon = document.getElementById("hide-pwd");
showPwdIcon.addEventListener("click", hidePassword);
hidePwdIcon.addEventListener("click", showPassword);

let pwdVisible = 0;

function showPassword() {
    pwdInputBox.type = "text";
    showPwdIcon.style.display = "block";
    hidePwdIcon.style.display = "none";
    pwdVisible = 1;

    setTimeout(()=>{
        if(pwdVisible == 1){
            hidePassword();
        }
    }, 2000);
}

function hidePassword() {
    pwdInputBox.type = "password";
    hidePwdIcon.style.display = "block";
    showPwdIcon.style.display = "none";
    pwdVisible = 0;
}

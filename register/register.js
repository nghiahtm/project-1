const errorEmpty = "Không để rỗng";
const errorPhoneLength = "Nhập đủ 10 ký tự";
const errorPhoneExp = "Sai định dạng số điện thoại";
const errorPasswordLength = "Mật khẩu có ít nhất 6 ký tự";
const errorRePassword = "Mật khẩu nhập lại chưa đúng";
const regexPhoneNumber = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
const idPhoneError = document.getElementById("phone-error");
const idBorderPassword = document.getElementById('border-password');
const idBorderPhone = document.getElementById('border-phone');
const idBorderRePassword = document.getElementById('border-re-password');
const changePassword = document.getElementById('ic-password');
const changeRePassword = document.getElementById('ic-re-password');
 changePassword.addEventListener("click",function () {
     let typePass = document.getElementById('password');
     let idEye = changePassword.querySelector("#eye");
     let idCloseEye = changePassword.querySelector("#close-eye");
     if(typePass.type === "password"){
         idCloseEye.removeAttribute("hidden");
         idEye.setAttribute("hidden","");
         typePass.type = "text";
     }else {
         idEye.removeAttribute("hidden");
         idCloseEye.setAttribute("hidden","");
         typePass.type = "password";
     }
});

 changeRePassword.addEventListener("click",function () {
     let idEyePass = document.getElementById('re-password');
     let idEye = changeRePassword.querySelector("#eye");
     let idCloseEye = changeRePassword.querySelector("#close-eye");
     if(idEyePass.type === "password"){
         idCloseEye.removeAttribute("hidden");
         idEye.setAttribute("hidden","");
         idEyePass.type = "text";
     }else {
         idEye.removeAttribute("hidden");
         idCloseEye.setAttribute("hidden","");
         idEyePass.type = "password";
     }
 });
function checkValidate() {
    const passwordValue = document.getElementById('password').value;
    const phoneValue = document.getElementById('phone').value;
    const rePassword = document.getElementById('re-password').value;

    if(phoneValue === ""){
        changeStateError(idBorderPhone);
        idPhoneError.innerHTML = errorEmpty;
    }
    else if(phoneValue.length < 10){
        changeStateError(idBorderPhone);
        idPhoneError.innerHTML = errorPhoneLength;
    }
    else if(regexPhoneNumber.test(phoneValue) === false){
        console.log(errorPhoneExp);
        changeStateError(idBorderPhone);
        idPhoneError.innerHTML = errorPhoneExp;
    }else {
        changeStateSuccess(idBorderPhone)
        idPhoneError.innerHTML = "";
    }

    if(passwordValue === ""){
        changeStateError(idBorderPassword)
        document.getElementById("password-error").innerHTML = errorEmpty;
    }else if(passwordValue.length < 6) {
        changeStateError(idBorderPassword)
        document.getElementById("password-error").innerHTML = errorPasswordLength;
    }else {
        changeStateSuccess(idBorderPassword)
        document.getElementById("password-error").innerHTML = "";
    }

    if(rePassword === ""){
        changeStateError(idBorderRePassword);
        document.getElementById("re-password-error").innerHTML = errorEmpty;
    }else if(rePassword !== passwordValue){
        changeStateError(idBorderRePassword);
        document.getElementById("re-password-error").innerHTML = errorRePassword;
    }else {
        changeStateSuccess(idBorderRePassword);
        document.getElementById("re-password-error").innerHTML = "";
    }
}

function changeStateError(tokenId) {
    tokenId.classList.add('error');
    tokenId.classList.remove('border-input');
}

function changeStateSuccess(tokenId) {
    tokenId.classList.remove('error');
    tokenId.classList.add('border-input');
}

function changeStateShow(typeText){
    return typeText.type === "password";
}
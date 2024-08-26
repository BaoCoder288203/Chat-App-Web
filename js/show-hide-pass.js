const pwdField = document.querySelector('.form input[type="password"]')
const toggle = document.querySelector('.form .field i');

toggle.onclick = ()=>{
    if(pwdField.type === "password"){
        pwdField.type = "text";
        toggle.classList.add('active');
    }else{
        pwdField.type = "password";
        toggle.classList.remove('active')
    }
}


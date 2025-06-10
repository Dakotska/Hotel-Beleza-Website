function smoothChange() {
    divImages = document.querySelector(".images");
    imgLogin = document.querySelector(".img-login");
    imgRegister = document.querySelector(".img-register");
    formLogin = document.querySelector(".form-login")
    formRegister = document.querySelector(".form-register")
    
    divImages.classList.toggle("login");
    divImages.classList.toggle("register");
    imgLogin.classList.toggle("active")
    imgLogin.classList.toggle("no-active")
    imgRegister.classList.toggle("active")
    imgRegister.classList.toggle("no-active")
    formRegister.classList.toggle("active")
    formRegister.classList.toggle("no-active")
    formLogin.classList.toggle("active")
    formLogin.classList.toggle("no-active")
}
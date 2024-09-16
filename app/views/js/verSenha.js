const togglePassword = document.querySelector("#verSenha");
const password = document.querySelector(".password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    
    // toggle the icon
    this.classList.toggle("fa-eye-slash");
});

// // prevent form submit
// const form = document.querySelector("form");
// form.addEventListener('submit', function (e) {
//     e.preventDefault();
// });
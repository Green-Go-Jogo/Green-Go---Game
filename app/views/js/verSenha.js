const togglePasswordIcons = document.querySelectorAll(".toggle-password");

togglePasswordIcons.forEach((icon) => {
    icon.addEventListener("click", function () {
        // Seleciona o campo de senha correspondente (campo irmão do ícone)
        const passwordField = this.previousElementSibling;
        
        // Alterna o atributo 'type' entre 'password' e 'text'
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
        
        // Alterna o ícone (fa-eye/fa-eye-slash)
        this.classList.toggle("fa-eye-slash");
    });
});

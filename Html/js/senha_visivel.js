document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("toggle-password").addEventListener("click", function() {
        var passwordInput = document.getElementById("password-input");
        var icon = this;

       
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bxs-lock");
            icon.classList.add("bxs-lock-open"); 
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bxs-lock-open");
            icon.classList.add("bxs-lock"); 
        }
    });
});


function togglePasswordVisibility() {
    let passwordInput = document.getElementById("password");
    let icon = document.querySelector("#password + button i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

function toggleMenu() {
    document.getElementById('mobileMenu').classList.toggle('hidden')
}
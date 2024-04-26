function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var message = document.getElementById("message");

    var nameRegex = /^[a-zA-Z\s]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (!name.match(nameRegex)) {
        message.innerHTML = "Veuillez entrer un nom valide";
        return false;
    }

    if (!email.match(emailRegex)) {
        message.innerHTML = "Veuillez entrer une adresse email valide";
        return false;
    }

    if (!password.match(passwordRegex)) {
        message.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, incluant au moins une minuscule, une majuscule et un chiffre";
        return false;
    }

    message.innerHTML = "";
    return true;
}

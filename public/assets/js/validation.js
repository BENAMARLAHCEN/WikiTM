function isValidName(name) {
    var nameRegex = /^[A-Za-z\s]+$/;
    return nameRegex.test(name);
}

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPassword(password) {
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return passwordRegex.test(password);
}

function validateImage(image) {
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.webp|\.svg)$/i;
    if (!allowedExtensions.exec(image)) {
        return false;
    } else {
        return true;
    }
}
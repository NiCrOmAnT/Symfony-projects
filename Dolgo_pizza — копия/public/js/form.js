
var form  = document.getElementsByTagName('form')[0];
var email = document.getElementById('registration_form_email');
var error = document.querySelector('.error');
var fields = form.querySelectorAll('.field');
email.classList.remove("error");
var validity = true;

form.addEventListener('submit', function (event) {
    validity = true;
    for (var i = 0; i < fields.length; i++) {
        if (!fields[i].value) {
            event.preventDefault();
            fields[i].classList.add("error");
            fields[i].setCustomValidity("Заполните поле.");
            validity = false;
        }
    }
    if (!validateEmail(email)){
        event.preventDefault();
        email.classList.add("error");
        email.setCustomValidity("Почта введена неверно.");
        validity = false;
    }
})

function validateEmail(email) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.getElementById('registration_form_email').value;
    return reg.test(address);
}





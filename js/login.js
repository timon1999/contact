$('#loginForm').on('submit', function (e) {
    e.preventDefault();
    // this code gets executed when the form is submitted

    // Check if input is valid

    // Input is valid
    $.ajax({
        type: "POST",
        url: "login.php",
        data: {
            email: $('#email').val(),
            password: sha512($('#password').val())
        },
        success: function (content) {
            if (content == 1) {
            document.location.replace('contact.php');
            } else {
                alert("E-Mail oder Passwort falsch!");
            }
        }
    });

    return false;
});

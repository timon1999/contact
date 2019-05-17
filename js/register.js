jQuery.validator.addMethod(
    "notEqualTo",
    function (elementValue, element, param) {
        return elementValue != param;
    },
    "Value cannot be {0}"
);
$(document).ready(function () {
    $(form1).validate({
        rules: {
            gender: {
                notEqualTo: 0
            },
            firstname: {
                required: true,
                maxlength: 15
            },
            lastname: {
                required: true,
                maxlength: 20
            },
            email: {
                required: true,
                email: true,
                minlength: 5,
                remote: {
                    url: 'validateEmail.php',
                    type: "post",
                    data:
                    {
                        email: function () {
                            return $('input[name="email"]').val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 8
            },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            },
            comment: {
                required: false,
                maxlength: 70
            }
        },
        messages: {
            gender: {
                notEqualTo: "Bitte wählen Sie Ihr Geschlecht."
            },
            firstname: {
                required: "Bitte geben Sie ihren Vornamen ein."
            },
            lastname: {
                required: "Bitte geben Sie Ihren Nachnamen ein."
            },
            email: {
                required: "Bitte geben Sie Ihre Email-Adresse ein.",
                email: "Bitte geben Sie eine gültige Email-Adresse ein.",
                remote: "Diese Adresse wird bereits verwendet."
            },
            password: {
                required: "Bitte geben Sie Ihr Passwort ein.",
                minlength: "Ihr Passwort muss aus mindestens 8 Zeichen bestehen."
            },
            confirmPassword: {
                required: "Bitte bestätigen Sie Ihr Passwort.",
                equalTo: "Die Passwörter stimmen nicht überein!"
            }
        }
    });
    $(form1).on('submit', function (e) {
        e.preventDefault();
        // this code gets executed when the form is submitted

        // Check if input is valid
        if ($(form1).valid()) {
            // Input is valid
            $.ajax({
                type: "POST",
                url: "register.php",
                data: {
                    gender: $('#gender').val(),
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    email: $('#email').val(),
                    password: sha512($('#password').val()),
                    confirmPassword: sha512($('#confirmPassword').val()),
                    comment: $('#confirmPassword').val()
                },
                success: function (content) {
                    document.location.replace('login.html');
                }
            });
        }

        return false;
    });

    $('#login-btn').on('click', function () {
        document.location.replace("login.html");
    });

    $('#senden').on('click', function () {
        document.location.replace("login.html");
    });

});
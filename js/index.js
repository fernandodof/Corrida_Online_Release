function validateLogin() {
    var emailLogin = $('#emailLogin').val();
    var passwordLogin = $('#passwordLogin').val();

    var data = {emailLogin: emailLogin, passwordLogin: passwordLogin, type: 'runner'};

    $('#loginErrorMsg').hide();
    $('#loginLoader').show();

    var url = $('#templateRoot').val()+'src/app/ajaxReceivers/validateLogin.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            if (serverResponse === '1') {
                window.location.replace('../pages/dashboard');
            } else {
                $('#loginLoader').hide();
                $('#loginErrorMsg').show();
                $('#loginErrorMsg').css("display", "block");
            }
        },
        error: function (data) {
            alert("Error");
        }
    });
}

function requestPasswordRecovery() {
    var email = $('#email').val();

    var data = {email: email};

    $('#loginErrorMsg').hide();
    $('#loginLoader1').show();

    var url = '../src/app/ajaxReceivers/requestPasswordRecovery.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            alertify.alert(serverResponse);
            $('#loginLoader1').hide();
            $('#email').val('');
            $(".pr-wrap").toggleClass("show-pass-reset");
            $('#forgotPasswordForm').data('bootstrapValidator').resetForm();

        },
        error: function (data) {
            $('#loginLoader1').hide();
            alertify.alert(data);
            alertify.alert('Desculpe, ocorreu um erro nas transmisão dos dados');
            $('#email').val('');
            $('#forgotPasswordForm').data('bootstrapValidator').resetForm();
        }
    });
}

$(document).ready(function () {

    var templateRoot = $('#templateRoot').val();

    $('#forgortPass').click(function (event) {
        $(".pr-wrap").toggleClass("show-pass-reset");
    });

//    $('#forgortPass').click(function (event) {
//        $(".pr-wrap").removeClass("show-pass-reset");
//    });

    $('#forgotPasswordForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh glyphicon-refresh-animate'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Por favor informe o endereço de email'
                    },
                    emailAddress: {
                        message: 'Endereço de email inválido'
                    },
                    remote: {
                        message: 'Email não cadastrado',
                        url: templateRoot + 'src/app/ajaxReceivers/checkEmailExists.php',
                        data: {
                            type: 'email'
                        }
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
        requestPasswordRecovery();
    });

});
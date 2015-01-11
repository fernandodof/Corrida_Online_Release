function subscribe() {
    $('#loginLoader').show();

    var name = $('#name').val();
    var email = $('#email').val();
    var login = $('#login').val();
    var password = $('#password1').val();

    var data = {name: name, email: email, login: login, password: password};

    var url = $('#templateRoot').val()+'src/app/ajaxReceivers/subscribe.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            if (serverResponse === '1') {
                $('#registrationForm').html("<div class='alert alert-success' role='alert'>Cadastro realizado com sucesso, clique abaixo para entrar</div>" +
                        "<a href='../pages/index' class='pull-left' id='goToIndex'>Página Inicial</a>");
            } else {
                $('#registrationForm').html("<div class='alert alert-danger' role='alert'>Ocorreu um erro com o seu cadastro por favor tente mais tarde</div>" +
                                            "<a href='../pages/index' class='pull-left' id='goToIndex'>Página Inicial</a>");
            }
            $('#loginLoader').hide();
        },
        error: function (data) {
            alert("Error");
            $('#registrationForm').html("<div class='alert alert-danger' role='alert'>Ocorreu um erro com o seu cadastro por favor tente mais tarde</div>");
        }
    });
}

$(document).ready(function () {
    $('#registrationForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh glyphicon-refresh-animate'
        },
        fields: {
            name: {
                message: 'O nome é inválido',
                validators: {
                    notEmpty: {
                        message: 'O nome é obrigatório e não pode ser vazio'
                    },
                    regexp: {
                        regexp: /^[A-zÀ-ú\s]*$/,
                        message: 'O nome deve conter apenas letras'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'O endereço de email não pode ficar vazio'
                    },
                    emailAddress: {
                        message: 'Endereço de email inválido'
                    },
                    remote: {
                        message: 'Email já cadastrado',
                        url: $('#templateRoot').val()+'src/app/ajaxReceivers/validateSubscription.php',
                        data: {
                            type: 'email'
                        }
                    }
                }
            },
            login: {
                message: 'Login é inválido',
                validators: {
                    notEmpty: {
                        message: 'O login é obrigatório e não pode ser vazio'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'O login deve ter entre 5 e 100 caracteres'
                    },
                    remote: {
                        message: 'Login já em uso',
                        url: $('#templateRoot').val()+'src/app/ajaxReceivers/validateSubscription.php',
                        data: {
                            type: 'login'
                        }
                    }
                }
            },
            password1: {
                validators: {
                    notEmpty: {
                        message: 'A senha não pode ficar vazia'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'A senha deve ter entre 6 e 30 caracteres'
                    },
                    identical: {
                        field: 'password2',
                        message: 'As senhas são diferentes'
                    }
                }
            },
            password2: {
                validators: {
                    notEmpty: {
                        message: 'A confirmação de senha não pode ficar vazia'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'A senha deve ter entre 6 e 30 caracteres'
                    },
                    identical: {
                        field: 'password1',
                        message: 'As senhas são diferentes'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        subscribe();
    });
});
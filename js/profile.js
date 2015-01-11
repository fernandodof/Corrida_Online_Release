var templateRoot;

function edit() {
    $('.editToogle').prop('disabled', function (i, oldVal) {
        return !oldVal;
    });
}


function editSubscription() {
    $('#loginLoader').show();
    $('body').dimBackground();
    var nome = $('#name').val();
    var email = $('#email').val();
    var login = $('#login').val();
    var password = $('#password1').val();

    var data = {name: nome, email: email, login: login, password: password};
    var url = templateRoot + 'src/app/ajaxReceivers/editSubscription.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            $('#editRegistrationForm').data('bootstrapValidator').resetForm();
            edit();
            $('#password1').val('');
            $('body').undim();
            $('#loginLoader').hide();
            alertify.alert('Cadastro atualizado');
        },
        error: function (data) {
            alertify.alert('Desculpe ocorreu um erro');
            edit();
            $('#password1').val('');
            $('body').undim();
            $('#loginLoader').hide();
        }
    });
}

function changePassword() {
    $('#loginLoader1').show();
    $('body').dimBackground();
    var password = $('#newPass1').val();

    var data = {password: password};
    var url = templateRoot + 'src/app/ajaxReceivers/changePassword.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            $('#changePassword').data('bootstrapValidator').resetForm();
            edit();
            $('#password1').val('');
            $('#newPass1').val('');
            $('#newPass2').val('');
            $('body').undim();
            $('#loginLoader1').hide();
            alertify.alert('Senha alterada');
        },
        error: function (data) {
            alertify.alert('Desculpe ocorreu um erro');
            edit();
            $('#password1').val('');
            $('body').undim();
            $('#loginLoader1').hide();
        }
    });
}

$(document).ready(function () {

    templateRoot = $('#templateRoot').val();

    $('#editRegistrationForm').bootstrapValidator({
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
                        url: templateRoot + 'src/app/ajaxReceivers/validateEdit.php',
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
                        url: templateRoot + 'src/app/ajaxReceivers/validateEdit.php',
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
                    remote: {
                        message: 'Senha não confere',
                        url: templateRoot + 'src/app/ajaxReceivers/validateEdit.php',
                        data: {
                            type: 'currentPass'
                        }
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        editSubscription();
    });


    $('#changePassword').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh glyphicon-refresh-animate'
        },
        fields: {
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
                    remote: {
                        message: 'Senha não confere',
                        url: templateRoot + 'src/app/ajaxReceivers/validateEdit.php',
                        data: {
                            type: 'currentPass'
                        }
                    }
                }
            },
            newPass1: {
                validators: {
                    notEmpty: {
                        message: 'Nova senha não pode ser vazia'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'A senha deve ter entre 6 e 30 caracteres'
                    },
                    identical: {
                        field: 'newPass2',
                        message: 'A senha e a confirmação são diferentes'
                    }
                }
            },
            newPass2: {
                validators: {
                    notEmpty: {
                        message: 'Confirmação de senha não pode ser vazia'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'A senha deve ter entre 6 e 30 caracteres'
                    },
                    identical: {
                        field: 'newPass1',
                        message: 'A senha e a confirmação são diferentes'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
        changePassword();
    });

});
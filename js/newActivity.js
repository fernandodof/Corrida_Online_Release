function submitNewRunForm() {
    var date = $('#runDate').val();
    var time = convertToSeconds($('#time').val());
    var distance = $('#distance').val();
    if ($('input[name=distanceUnit]:checked').val() === 'm') {
        distance = distance / 1000;
    }

    var notes = $('#notes').val();
    var avgSpeed = parseFloat($('#avgSpeed').val());
    var avgPace = parseFloat($('#avgPace').val());

    var data = {date: date, time: time, distance: distance, notes: notes, avgSpeed: avgSpeed, avgPace: avgPace};

    $('#loader').show();

    var url = $('#templateRoot').val()+'src/app/ajaxReceivers/addNewRun.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            if (serverResponse === '1') {
                resetMyForm($('#newRunForm'));
                $('#avgPace').val('');
                $('#avgSpeed').val('');
                alertify.alert('Nova Corrida adicionada com sucesso');
                $('#loader').hide();
            } else {
                $('#loader').hide();
                alertify.alert('Ocorreu um erro na transmissão do dados, tente novamente mais tarde');
            }
        },
        error: function (data) {
            alertify.alert('Ocorreu um erro na transmissão do dados, tente novamente mais tarde');
        }
    });

}

function setUpFormValidation() {

    $.fn.bootstrapValidator.validators.invalidTime = {
        validate: function (validator, $field, options) {
            var value = $field.val();

            if (convertToSeconds(value) <= 0) {
                return false;
            }

            return true;
        }
    };

    $.fn.bootstrapValidator.validators.invalidDistance = {
        validate: function (validator, $field, options) {
            var value = $field.val();

            if (!validateDistance(value)) {
                return false;
            }

            return true;
        }
    };

    $('#newRunForm').bootstrapValidator({
        live : 'disabled',
        fields: {
            runDate: {
                validators: {
                    notEmpty: {
                        message: 'A data é obrigatória'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'Data inválida'
                    }
                }
            },
            time: {
                validators: {
                    notEmpty: {
                        message: 'O tempo é obrigatório'
                    },
                    regexp: {
                        regexp: /^[0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}$/,
                        message: 'Tempo inválido'
                    },
                    invalidTime: {
                        message: 'Tempo inválido'
                    }
                }
            },
            distance: {
                validators: {
                    invalidDistance: {
                        message: 'formato iválido (ex: 8 ou 4.50)'
                    },
                    notEmpty: {
                        message: 'Informe a distancia'
                    }
                }
            },
            notes: {
                validators: {
                    stringLength: {
                        max: 300,
                        message: 'Insira no máximo 300 caracteres'
                    }
                }
            }
        }
    }).on('error.validator.bv', function (e, data) {
        // $(e.target)    --> The field element
        // data.bv        --> The BootstrapValidator instance
        // data.field     --> The field name
        // data.element   --> The field element
        // data.validator --> The current validator name

        data.element
                .data('bv.messages')
                // Hide all the messages
                .find('.help-block[data-bv-for="' + data.field + '"]').hide()
                // Show only message associated with current validator
                .filter('[data-bv-validator="' + data.validator + '"]').show();
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        submitNewRunForm();
    });
}

$(document).ready(function () {
    setUpFormValidation();
    $('#second-option').addClass('active');
});
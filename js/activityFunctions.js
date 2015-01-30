function calculateSpeedPace() {
    if ($('#distance').val() !== '' && (parseFloat($('#distance').val()) > 0) && $('#time').val() !== '' && validateTime($('#time').val()) && convertToSeconds($('#time').val()) > 0) {
        var seconds = convertToSeconds($('#time').val());
        var minutes = convertToMinutes($('#time').val());
        var distance = parseFloat($('#distance').val().replace(/,/g, '.'));


        if ($('input[name=distanceUnit]:checked').val() === 'k') {
            distance = distance * 1000;
        }

        if (seconds > 0) {
            var speed = (distance / seconds) * 3.6;
            var pace = minutes / (distance / 1000);

            $('#avgSpeed').val(Math.round(speed * 100) / 100 + ' km/h');
            $('#avgPace').val((Math.round(pace * 100) / 100 + ' min/km'));
        }
    } else {
        $('#avgSpeed').val('');
        $('#avgPace').val((''));
    }
}

function validateTime(str) {
    var pattern = new RegExp('^[0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}$');
    return pattern.test(str);
}

function validateDistance(str) {
    var pattern = new RegExp('^[0-9]+((\.|\,){1}[0-9]{0,2})?$');
    return pattern.test(str);
}

function convertToSeconds(str) {
    var timeArray = str.split(':');
    var seconds = (+timeArray[0]) * 60 * 60 + (+timeArray[1]) * 60 + (+timeArray[2]);
    return seconds;
}

function convertToMinutes(str) {
    var timeArray = str.split(':');
    var seconds = (+timeArray[0]) * 60 + (+timeArray[1]) + (+Math.floor(timeArray[2] / 60));
    return seconds;
}

function resetMyForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:checkbox').removeAttr('selected');
//    $form.find('input:radio').removeAttr('checked');
    $('#time').val('00:00:00');
//    $form.data('bootstrapValidator').resetForm();
}


function revalidateTime() {
    $('#newRunForm').bootstrapValidator('revalidateField', 'time');
}

$(document).ready(function () {

    $('#time').timepicker({
        showMeridian: false,
        defaultTime: '00:00:00',
        showSeconds: true,
        minuteStep: 1,
        secondStep: 1
    });
    
    var maxDate = new Date();
    
    $('#runDate').pickadate({
        format: 'dd/mm/yyyy',
        formatSubmit: 'dd/mm/yyyy',
        hiddenName: true,
        clear: 'limpar',
        close: 'fechar',
        selectYears: true,
        selectMonths: true,
        max: true
    });

    $('#runDate').pickadate('picker').on('render', function () {
        $('#newRunForm').bootstrapValidator('revalidateField', 'runDate');
    });

    $(".clendar-icon").click(function () {
        var picker = $("#runDate").pickadate('picker');
        if (picker.get("open")) {
            picker.close();
        }
        else {
            picker.open();
        }
        event.stopPropagation();
    });

    $("input[name='distanceUnit']").on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed check ', function (event) {
        if (event.type === "ifChecked") {
            $(this).trigger('click');
            $('input').iCheck('update');
        }
        if (event.type === "ifUnchecked") {
            $(this).trigger('click');
            $('input').iCheck('update');
        }
        if (event.type === "ifDisabled") {
            console.log($(this).attr('id') + 'dis');
            $('input').iCheck('update');
        }
    }).iCheck({
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
    });


    $('#distance').keypress(function (eve) {
        if ((eve.which !== 46 || $(this).val().indexOf('.') !== -1) && (eve.which !== 44 || $(this).val().indexOf(',') !== -1) && (eve.which < 48 || eve.which > 57) || (eve.which === 46 && $(this).caret().start === 0)) {
            eve.preventDefault();
        }
    });
});
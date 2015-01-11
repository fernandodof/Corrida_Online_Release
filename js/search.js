function searchByDate() {

    if ($('#runDate').val() === '') {
        $('#help-date').show();
        return;
    } else {
        $('#help-date').hide();
    }

    $('#progress').show();

    var date = $('#runDate').val();

    var data = {date: date};

    var url = $('#templateRoot').val() + 'src/app/ajaxReceivers/searchRunByDate.php';
    $.ajax({
        type: "POST",
        url: url,
        async: true,
        data: data,
        success: function (serverResponse) {
            $('#search-results').html(serverResponse);
            $('#progress').hide();
        },
        error: function (data) {
            alertify.alert('Ocorreu um erro na transmissão do dados, tente novamente mais tarde');
        }
    });
}

$(document).ready(function () {

    $('#thrid-option').addClass('active');

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
});


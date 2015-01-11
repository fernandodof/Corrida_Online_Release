function removeRun(id) {

    alertify.confirm("Deseja realmente apagar essa corrida ? (esta operação é permanente)", function (e) {
        if (e) {
            var data = {runId: id};

            var url = $('#templateRoot').val()+'src/app/ajaxReceivers/removeRun.php';
            $.ajax({
                type: "POST",
                url: url,
                async: true,
                data: data,
                success: function (serverResponse) {
                    if (serverResponse === '1') {
                        $("#runs").dataTable().fnDraw();
                        alertify.success('Corrida apagada.');
                    } else {
                        alertify.error('Desculpe ocorreu um erro.');
                    }
                },
                error: function (data) {
                    alertify.error('Desculpe ocorreu um erro.');
                }
            });
        }
    });
}

$(document).ready(function () {

    $('#first-option').addClass('active');

    var table = $('#runs').dataTable({
        language: {
            processing: "Processando...",
            search: "Pesquisar&nbsp;:",
            lengthMenu: "Mostrar _MENU_ Corridas",
            info: "Mostrando de _START_ até _END_ de _TOTAL_ corridas",
            infoEmpty: "Mostrando de 0 até 0 de 0 corridas",
            infoFiltered: "",
            infoPostFix: "",
            loadingRecords: "Carregando corridas...",
            zeroRecords: "Não foram encontrados resultados",
            emptyTable: "Nenhuma corrida encotrada",
            paginate: {
                first: "Primeira",
                previous: "Anterior",
                next: "Próxima",
                last: "Última"
            },
            aria: {
                sortAscending: ": Habilitar ordenação ascendente",
                sortDescending: ": Habilitar ordenação descendente"
            }
        },
        "bProcessing": true,
        "bServerSide": true,
        "bRetrieve": true,
        "bPaginate": true,
        "responsive": true,
        "scrollX": true,
        "pagingType": "full_numbers",
        "sServerMethod": "POST",
        "order": [[0, "desc"]],
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todas"]],
        "sAjaxSource": $('#templateRoot').val()+"src/app/ajaxReceivers/runsTablePagination.php",
        "aoColumns": [
            {"mData": "fullDate"},
            {"mData": "distance"},
            {"mData": "fullTime"},
            {"mData": "avgSpeed"},
            {"mData": "pace"},
            {"mData": "notesId", "mRender": function (notesId) {
                    $('[data-toggle="popover"]').popover();
                    var strReturn = '';
                    var notes = notesId.split("|")[0];
                    var id = notesId.split("|")[1];
                    if (notes !== null && notes !== "") {
                        strReturn += "<a href='#' tabindex='0' class='notes-btn t-link' role='button' data-placement='left' data-toggle='popover' data-trigger='focus' title='Observações' data-content='" + notes + "'><span class='fa fa-fw fa-2x fa-paperclip' ></span></a>\n";
                    }
                    var templateRoot = $('#templateRoot').val();
                    strReturn += "<a href='"+templateRoot+"pages/editActivity?code="+id+"' title='Editar'><span class='fa fa-fw fa-2x fa-edit t-link'></span></a>";
                    strReturn += "<a href='#' onclick='removeRun(" + id + ");' title='Excluir'><span class='fa fa-fw fa-2x fa-trash red-icon t-link'></span></a>\n";
                    return  strReturn;
                }}
        ],
        "fnDrawCallback": function (oSettings) {
            $('[data-toggle="popover"]').popover();
        },
        "columnDefs": [
            {orderable: false, targets: [5]}
        ],
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData['id']);
        }

    });


    $('[data-toggle="popover"]').popover();

    var tt = new $.fn.dataTable.TableTools($('#runs'));
    $(tt.fnContainer()).insertBefore('div.dataTables_wrapper');

    $('#runs tbody').on('click', 'tr', function () {
        if ($(this).hasClass('rowSelected')) {
            $(this).removeClass('rowSelected');
        }
        else {
            table.$('tr.rowSelected').removeClass('rowSelected');
            $(this).addClass('rowSelected');
        }
    });
    
    
    $('.sorting').append("<span class='fa fa-fw fa-sort blue-icon'></span>");
    
});
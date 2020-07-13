var tableImovel;
$('document').ready(function() {

    tableImovel=$('#locarImovel').DataTable({
        "ajax": "modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao=localImovel",
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum Endereço de Imóvel encontrado",
            "sSearch": "Pesquisar",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }

        }
    });

    $("#modal-mensagem").modal({ backdrop: false, keyboard: false,show:false });

    $(document).on("click", "button.actionBtn", function (event) {

        event.preventDefault();
        var id = $(this).data("id");

        if (confirm('Deseja realmente realizar locação?')) {
            $.ajax({
                url: "modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao=locar&id=" + id,
                type: "POST",
                data: {
                    locacao:true
                },
                dataType: "TEXT",
                beforeSend: ()=> {
                    $("#modal-mensagem").modal("show");
                    $("#modal-mensagem .modal-title").text("Locando um determinado Endereço Imóvel!").css("display", "block");
                    $("#modal-mensagem p").text("locando...").attr("class", "text-color");
                    $("#modal-mensagem .modal-footer").css("display", "none");
                    setTimeout(() => {
                        $("#modal-mensagem").modal("hide");
                    }, 2000);
                },
                success: function (data) {

                    $("#modal-mensagem").modal("show");
                    $("#modal-mensagem .modal-title").css("display", "none");
                    if (data.indexOf("Erro") != -1){
                        $("#modal-mensagem p").text(data).attr("class", "alert alert-danger");
                    }else{
                        tableImovel.ajax.reload();
                        $("#modal-mensagem p").text(data).attr("class", "alert alert-success");
                    }
                    $("#modal-mensagem .modal-footer").css("display", "none");
                    setTimeout(function() {
                        $("#modal-mensagem").modal("hide");
                      }, 2000);
                },
                error: function (xhr, textStatus, error) {
                    console.error("erro no servidor");
                }

            });
        }

    });

});

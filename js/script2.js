var tableListaImovel;
var acao = "";
$('document').ready(function() {

    tableListaImovel=$('#listaImovel').DataTable({
        "ajax": "/modelo_locacao_imoveis/ControllerLocacaoImoveis.php",
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
            "sZeroRecords": "Nenhum registro encontrado",
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


    $("#cep").mask("99999-999");
    $("#modal-mensagem").modal({ backdrop: false, keyboard: false,show:false });

    $("#numero").bind("keyup blur focus", function (e) {
        e.preventDefault();
        var expre = /[^\d]/g;
        $(this).val($(this).val().replace(expre, ''));
    });

    $("#cep").blur(function (event) {
        event.preventDefault();
        let cep = $('[name="cep"]').val();

        if(cep.trim() != ""){
            cep=cep.replace("-","");
            $.ajax({

                url: "/modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao=getCep&cep=" + cep,
                type: "GET",
                dataType: "JSON",
                beforeSend: ()=> {
                    $("#modal-mensagem").modal("show");
                    $("#modal-mensagem .modal-title").text("Buscar cep informado!").css("display", "block");
                    $("#modal-mensagem p").text("buscando cep...").attr("class", "text-color");
                    $("#modal-mensagem .modal-footer").css("display", "none");
                    setTimeout(() => {
                        $("#modal-mensagem").modal("hide");
                    }, 2000);
                },
                success: function (data) {
                    if (data.erro){
                        $("#modal-mensagem").modal("show");
                        $("#modal-mensagem .modal-title").css("display", "none");
                        $("#modal-mensagem p").text("CEP não encontrado!").attr("class", "alert alert-danger");
                        $("#modal-mensagem .modal-footer").css("display", "none");
                        setTimeout(function() {
                        $("#modal-mensagem").modal("hide");
                        }, 2000);
                    }else{
                        $('[name="cep"]').val(data.cep);
                        $('[name="localidade"]').val(data.localidade);
                        $('[name="uf"]').val(data.uf);
                        $('[name="logradouro"]').val(data.logradouro);
                        $('[name="bairro"]').val(data.bairro);
                        $('[name="complemento"]').val(data.complemento);
                    }
                },
                error: function (xhr, textStatus, error) {
                    console.error("erro no servidor");
                }
            });
        }

    });

    $(document).on("submit", "#form", function (event) {
        event.preventDefault();

        let id = $('[name="id"]').val();
        let dataForm = $("#form").serializeArray();
        let addUpdate = "Adicionar novo";
        acao="add";

        if(id != ""){
            acao="edit&id="+id;
            addUpdate="Alterar um determinado"
        }

        let url = "/modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao="+acao;

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            dataType: "text",
            beforeSend: ()=> {
                $("#modal-mensagem").modal("show");
                $("#modal-mensagem .modal-title").text(addUpdate+" Endereço de Imóvel!").css("display", "block");;
                $("#modal-mensagem p").text("enviando...").attr("class", "text-color");
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
                    setTimeout(function() {
                      $("#modal-mensagem").modal("hide");
                    }, 2000);
                }else{

                    $("#modal-mensagem p").text(data).attr("class", "alert alert-success");
                    setTimeout(function() {
                      $("#modal-mensagem").modal("hide");
                      location.replace("#tableLista");
                      tableListaImovel.ajax.reload();
                      $("#form")[0].reset();
                    }, 2000);
                }
                $("#modal-mensagem p").css({ "text-align": "center", "width": "500px", "margin-left": "25px" });
                $("#modal-mensagem .modal-footer").css("display", "none");

            },
            error: function (xhr, testStatus, error) {
                console.log("erro no servidor");
            }
        });
    });

    $(document).on("click", "button.actionBtn", function (event) {

        event.preventDefault();
        var id = $(this).data("id");
        var action = $(this).data("action");
        if (action == "edit") 
        {
            location.replace("#headerNav");
                $.ajax({

                    url: "/modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao=get&id=" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) {
                        
                        if (data.erro){
                            $("#modal-mensagem").modal("show");
                            $("#modal-mensagem .modal-title").css("display", "none");
                            $("#modal-mensagem p").text(data.msg).attr("class", "alert alert-danger");
                            $("#modal-mensagem .modal-footer").css("display", "none");
                            setTimeout(function() {
                              $("#modal-mensagem").modal("hide");
                            }, 2000);
                        }else{
                                $('[name="id"]').val(data.id);
                                $('[name="descricao"]').val(data.descricao);
                                $('[name="numero"]').val(data.numero);
                                $('[name="cep"]').val(data.cep);
                                $('[name="localidade"]').val(data.localidade);
                                $('[name="uf"]').val(data.uf);
                                $('[name="logradouro"]').val(data.logradouro);
                                $('[name="bairro"]').val(data.bairro);
                                $('[name="complemento"]').val(data.complemento);
                        }
                    },
                    error: function (xhr, textStatus, error) {
                        console.error("erro no servidor");
                    }
    
                });
        }
        else if (action == "del") 
        {
            if (confirm('Deseja realmente excluir?')) {
                $.ajax({
                    url: "/modelo_locacao_imoveis/ControllerLocacaoImoveis.php?acao=del&id=" + id,
                    type: "POST",
                    dataType: "TEXT",
                    beforeSend: ()=> {
                        $("#modal-mensagem").modal("show");
                        $("#modal-mensagem .modal-title").text("Deletar um determinado Endereço Imóvel!").css("display", "block");
                        $("#modal-mensagem p").text("deletando...").attr("class", "text-color");
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
                            tableListaImovel.ajax.reload();
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
        }

    });

});

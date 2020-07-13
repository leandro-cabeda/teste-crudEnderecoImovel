<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista e Cadastro de Endereço Imóvel</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
    <link href="../css/style.css" rel="stylesheet" media="screen">
</head>

<body>
    <nav class="navbar navbar-inverse" id="headerNav">
        <div class="container-fluid">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="../index.php">Lista de Imóveis para Locação</a></li>
                <li role="presentation"><a href="#">Lista e Cadastro de Endereço Imóvel</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid container-table">
        <div class="row">
            <div class="col-md-12">
                <h1 class="descricao text-center">Cadastro Locação Imóvel</h1>
                <form id="form">
                    <input type="hidden" name="id" value="">
                    <div class="col-md-6">
                        <label class="control-label descricao label-alinhamento">Busque o Endereço de Imóvel informando cep abaixo:</label>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">CEP:*</label>
                                <input name="cep" id="cep" required class="form-control w-40" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Localidade:*</label>
                                <input name="localidade" required class="form-control w-70" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label label-alinhamento">UF:*</label>
                                <input name="uf" required class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Descrição:*</label>
                                <textarea name="descricao" class="form-control" required cols="70" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Numero:*</label>
                                <input name="numero" id="numero" required class="form-control w-40" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Complemento:</label>
                                <input name="complemento" class="form-control w-70" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Bairro:</label>
                                <input name="bairro" class="form-control w-70" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label label-alinhamento">Logradouro:*</label>
                                <input name="logradouro" required class="form-control w-80" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center col-md-12">
                        <button type="submit" id="btnSave" class="btn btn-primary btn-lg">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" id="tableLista">
            <div class="col-sm-12 col-md-12">
                <table id="listaImovel" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="thText">Descricao</th>
                            <th class="thTable">CEP</th>
                            <th>Numero</th>
                            <th>Logradouro</th>
                            <th>Localidade - UF</th>
                            <th class="thTable">Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-mensagem">
        <div class="modal-dialog" id="dialog_Modal_Mensagem">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p role="alert"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <h2 class="text-center">Informações do
                    responsável do site</h2>
                <ul class="list-group">
                    <li class="list-group-item">© Copyright 2020
                        Copyright.com.br - All Rights Reserved</li>
                    <li class="list-group-item"><i class="fa fa-at"></i>
                        E-mail: leandro.cabeda@hotmail.com</li>
                    <li class="list-group-item">Cidade/Estado: Passo
                        Fundo/RS</li>
                    <li class="list-group-item">Fale direto com
                        responsável pelo WhatsApp >>
                        &nbsp;<a href="https://wa.me/5554999337135?text=Olá%20Leandro" target="_blank"><i style="font-size: 30px;" class="fa fa-whatsapp"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-12">
                <h2 class="text-center">Siga-me</h2>
                <div class="list-group text-center">
                    <a href="https://www.facebook.com/leandro.cabeda" target="_blank" class="list-group-item
                                list-group-item-action">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                    <a href="https://www.linkedin.com/in/leandro-cabeda-rigo-b82b2678" target="_blank" class="list-group-item
                                list-group-item-action">
                        <i class="fa fa-linkedin"></i> Linkedin
                    </a>
                    <a href="https://github.com/leandro-cabeda" target="_blank" class="list-group-item
                                list-group-item-action">
                        <i class="fa fa-github"> GitHub</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/script2.js"></script>
</body>

</html>
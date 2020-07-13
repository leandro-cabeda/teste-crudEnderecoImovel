<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Imóveis para Locação</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="#">Lista de Imóveis para Locação</a></li>
                <li role="presentation"><a href="pagina/listaCadastroLocacaoImoveis.php">Lista e Cadastro de Endereço Imóvel</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid container-table">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1 class="descricao text-center">Lista de Imóveis para Locação</h1>
                <table id="locarImovel" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="thText">Descricao</th>
                            <th>CEP</th>
                            <th>Numero</th>
                            <th>Logradouro</th>
                            <th>Localidade - UF</th>
                            <th>Locação</th>
                        </tr>
                    </thead>
                </table>
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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
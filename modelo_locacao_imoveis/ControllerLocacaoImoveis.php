<?php

require_once('ClassLocacaoImoveis.php');

$locacao = new LocacaoImovel();

$acao = '';

if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}

switch ($acao) {
    case '':
        echo $locacao->listaEnderecosImoveis();
        break;
    case 'add':
        echo $locacao->addEnderecosImoveis($_REQUEST);
        break;
    case 'edit':
        echo $locacao->editEnderecosImoveis($id, $_REQUEST);
        break;
    case 'del':
        echo $locacao->delEnderecosImoveis($id);
        break;
    case 'locar':
        echo $locacao->locarEnderecosImoveis($id, $_REQUEST);
        break;
    case 'get':
        echo $locacao->getEnderecoImovel($id);
        break;
    case 'localImovel':
        echo $locacao->getEnderecosImoveis();
        break;
    case 'getCep':
        echo $locacao->getCep($_REQUEST['cep']);
        break;
}

<?php

require_once('../db_conexao/dbconect.php');

class LocacaoImovel
{
    private $sql;
    private $res;
    private $db;

    public function __construct()
    {
        $this->db = new Conecta();
        $this->db = $this->db->getDb();
    }

    public function listaEnderecosImoveis()
    {
        $this->sql = 'select * from enderecos_imoveis';
        $this->res = $this->db->query($this->sql) or die("Erro na consulta: $this->sql" . $this->db->error);
        $data = array("data" => array());
        while ($row = $this->res->fetch_assoc()) {
            $id = $row['id'];
            $botoes = "<button class='btn btn-primary actionBtn' data-id='$id' data-action='edit'><i class='glyphicon glyphicon-pencil'></i></button>&nbsp;";
            $botoes .= "<button class='btn btn-danger actionBtn' data-id='$id' data-action='del'><i class='glyphicon glyphicon-trash'></i></button>";
            $linha = [];
            $linha[] = $row['id'];
            $linha[] = '<textarea readonly class="form-control" cols="35" rows="3">' . $row["descricao"] . '</textarea>';
            $linha[] = $row['cep'];
            $linha[] = $row['numero'];
            $linha[] = $row['logradouro'];
            $linha[] =
                '<p>Cidade: ' .
                $row["localidade"] . '</p>' .
                '<p>Estado: ' .
                $row["uf"] . '</p>';
            $linha[] = $botoes;
            $data['data'][] = $linha;
        }

        return json_encode($data);
    }

    public function addEnderecosImoveis($data)
    {
        if (!$this->verificaNumeroImovelDuplicado($data['numero'])) {
            $this->sql = 'insert into enderecos_imoveis (cep,localidade,uf,descricao,';
            $this->sql .= 'numero,complemento,bairro,logradouro)';
            $this->sql .= " values ('" . $data['cep'] . "','" . $data['localidade'] . "','" . $data['uf'] . "',";
            $this->sql .= " '" . $data['descricao'] . "'," . $data['numero'] . ",'" . $data['complemento'] . "',";
            $this->sql .= " '" . $data['bairro'] . "','" . $data['logradouro'] . "')";
            $this->res = $this->db->query($this->sql);

            if (!$this->res) {
                return 'Erro ao adicionar Endereço de Imóvel no Banco!!';
            } else {
                return 'Adicionado com Sucesso no Banco!!!';
            }
        } else {
            return 'Erro ! Esse número de Endereço do Imóvel já existe no banco de dados cadastrado!!';
        }
    }

    public function editEnderecosImoveis($id, $data)
    {
        $this->sql = "update enderecos_imoveis set cep='" . $data['cep'] . "',localidade='" . $data['localidade'] . "',";
        $this->sql .= "uf='" . $data['uf'] . "',descricao='" . $data['descricao'] . "',numero=" . $data['numero'] . ",";
        $this->sql .= "logradouro='" . $data['logradouro'] . "'";
        $this->sql .= ",bairro='" . $data['bairro'] . "'";
        $this->sql .= ",complemento='" . $data['complemento'] . "'";
        $this->sql .= " where id=$id";
        $this->res = $this->db->query($this->sql);

        if (!$this->res) {
            return 'Erro ao alterar Endereço de Imóvel no Banco!!';
        } else {
            return 'Alterado com sucesso no Banco';
        }
    }

    public function locarEnderecosImoveis($id, $data)
    {
        $this->sql = "update enderecos_imoveis set locacao=" . $data['locacao'];
        $this->sql .= " where id=$id";
        $this->res = $this->db->query($this->sql);

        if (!$this->res) {
            return 'Erro ao realizar locação!!';
        } else {
            return 'Locação realizada!';
        }
    }

    public function delEnderecosImoveis($id)
    {
        $this->sql = "delete from enderecos_imoveis where id=$id";
        $this->res = $this->db->query($this->sql);

        if (!$this->res) {
            return 'Erro ao deletar Endereço do Imóvel do id: ' . $id;
        } else {
            return 'Deletado Endereço do Imóvel com sucesso do id: ' . $id . ' !';
        }
    }

    public function getEnderecoImovel($id)
    {
        $this->sql = "select * from enderecos_imoveis where id=$id";

        $this->res = $this->db->query($this->sql);
        $data = array();
        if (!$this->res) {
            $data['erro'] = true;
            $data['msg'] = "Erro ! Endereço do Imóvel não encontrado do id: $id !";
            return json_encode($data);
        } else {
            while ($row = $this->res->fetch_assoc()) {
                $data['id'] = $row['id'];
                $data['descricao'] = $row["descricao"];
                $data['cep'] = $row['cep'];
                $data['numero'] = $row['numero'];
                $data['logradouro'] = $row['logradouro'];
                $data['localidade'] = $row["localidade"];
                $data['uf'] = $row["uf"];
                $data['bairro'] = $row["bairro"];
                $data['complemento'] = $row["complemento"];
            }

            return json_encode($data);
        }
    }

    public function getEnderecosImoveis()
    {
        $this->sql = "select * from enderecos_imoveis order by id desc";

        $this->res = $this->db->query($this->sql) or die("Erro na consulta: $this->sql" . $this->db->error);
        $data = array("data" => array());
        while ($row = $this->res->fetch_assoc()) {
            $id = $row['id'];
            $linha = [];
            $linha[] = '<textarea readonly class="form-control" cols="35" rows="3">' . $row["descricao"] . '</textarea>';
            $linha[] = $row['cep'];
            $linha[] = $row['numero'];
            $linha[] = $row['logradouro'];
            $linha[] =
                '<p>Cidade: ' .
                $row["localidade"] . '</p>' .
                '<p>Estado: ' .
                $row["uf"] . '</p>';
            if ($row['locacao']) {
                $linha[] = 'Imóvel está locado no momento!';
            } else {
                $linha[] = "<button class='btn btn-success actionBtn' data-id='$id' data-action='locar'><i class='glyphicon glyphicon-check'></i>&nbsp;Locar Imóvel</button>";
            }
            $data['data'][] = $linha;
        }

        return json_encode($data);
    }

    public function getCep($cep)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://viacep.com.br/ws/' . $cep . '/json',
        ]);

        $data = json_decode(curl_exec($curl));

        curl_close($curl);

        return json_encode($data);
    }

    public function verificaNumeroImovelDuplicado($numero)
    {
        $this->sql = "select * from enderecos_imoveis where numero=$numero";
        $this->res = $this->db->query($this->sql);

        if ($this->res->num_rows > 0) {
            return true;
        }

        return false;
    }
}

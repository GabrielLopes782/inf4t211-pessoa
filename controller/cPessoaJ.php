<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaF
 *
 * @author jairb
 */
require_once '../model/pessoaJ.php';

class cPessoaJ {

    //put your code here
    public $PJ = [];

    public function __construct() {
        $this->mokPJ();
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('Senac');
        $pj1->setTelefone(5133443344);
        $pj1->setEmail('contato@senacrs.com.br');
        $pj1->setEndereco('Venancio Aires');
        $pj1->setCnpj(123123123000101);
        $pj1->setNomeFantasia('Senac Tech');
        $this->addPessoaJ($pj1);

        $pj2 = new pessoaJ();
        $pj2->setNome('Walmart');
        $pj2->setTelefone(51988998899);
        $pj2->setEmail('loja03@walmar.com');
        $pj2->setEndereco('Av dos Estados');
        $pj2->setCnpj(321321123000103);
        $pj2->setNomeFantasia('Nacional');
        $this->addPessoaJ($pj2);
    }

    public function getPessoaJById($id) {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);
        if (!$conexao) {
            die('Sem conexão: ' . mysqli_error());
        }
        $sql = "select * from pessoa where idPessoa = $id";
        $result = mysqli_query($conexao, $sql);
        $pjsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pjsBD, $row);
            }
            return $pjsBD;
        }
        mysqli_close($conexao);
    }

    public function getAllPessoaPJBD() {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('Sem conexão: ' . mysqli_error());
        }

        $sql = "select * from pessoa where cpf is null";
        $result = mysqli_query($conexao, $sql);
        $pjsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pjsBD, $row);
            }
            $_REQUEST['pessoasPJBD'] = $pjsBD;
        } else {
            $_REQUEST['pessoasPJBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function getAll() {
        $_REQUEST['listaPessoasJ'] = $this->PJ;
        $this->getAllPessoaPJBD();
        require_once '../view/listaPessoaJ.php';
    }

    public function addPessoaJ($p) {
        array_push($this->PJ, $p);
    }

    public function imprimePJ() {
        foreach ($this->PJ as $pes) {
            echo $pes;
        }
    }

    public function salvarPessoaJBD() {
        if (isset($_POST['salvarPJ'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }

            $getNome = $_POST['nome'];
            $getNomeFantasia = $_POST['nomeFantasia'];
            $getTelefone = $_POST['tel'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['endereco'];
            $getCnpj = $_POST['cnpj'];


            $sql = "insert into `pessoa` (`nome`,`nomeFantasia`,`telefone`,`email`,`endereco`,"
                    . "`cnpj`) values ('$getNome','$getNomeFantasia','$getTelefone',"
                    . "'$getEmail','$getEndereco','$getCnpj')";
            mysqli_select_db($conexao, 'inf4t211');
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao inserir: ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function deletarPessoaJBD() {
        if (isset($_POST['delete'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);
            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }
            $id = $_POST['id'];
            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die('Erro ao deletar: ' . mysqli_error($conexao));
            }

            echo 'Registro deletado com sucesso!';
            mysqli_close($conexao);
            header('Refresh: 0'); //recarrecar a página F5
        }
    }

    public function updatePessoaJ() {
        if (isset($_POST['updatePJ'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error($conexao));
            }
            $getIdPessoa = $_POST['idPessoa'];
            $getNome = $_POST['nome'];
            $getNomeFantasia = $_POST['nomeFantasia'];
            $getTelefone = $_POST['tel'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['endereco'];
            $getCnpj = $_POST['cnpj'];
           

            $sql = "UPDATE `pessoa` SET `nome`='$getNome',`telefone`='$getTelefone',"
                    . "`email`='$getEmail',`endereco`='$getEndereco',`cnpj`='$getCnpj',"
                    . "`nomeFantasia`='$getNomeFantasia' WHERE `idPessoa`='$getIdPessoa'";
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die("Erro ao atualizar pessoa. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: gerPesJuridica.php');
        }
        if (isset($_POST['cancelarUP'])) {
            header('Location: gerPesJuridica.php');
        }
    }

}

?>
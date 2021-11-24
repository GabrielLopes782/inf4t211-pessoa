<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaJ.php';
$gerPJ = new cPessoaJ();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. Pessoa Jurídica</title>
    </head>
    <body>
        <h1>Ger. Pessoa Jurídica</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $gerPJ->salvarPessoaJBD(); ?>" method="POST">
            <input placeholder="Nome aqui ..." type="text" required name="nome"/>
            <input placeholder="Nome Fantasia aqui ..." type="text" required name="nomeFantasia"/>
            <br><br>
            <input placeholder="Telefone aqui ..." required type="tel" name="tel"/>
            <br><br>
            <input placeholder="E-mail aqui ..." required type="email" name="email"/>
            <br><br>
            <input placeholder="Endereço aqui ..." required type="text" name="endereco"/>
            <br><br>
            <input placeholder="CNPJ aqui ..." required type="number" name="cnpj"/>
            <br><br>
            <input type="submit" value="Salvar" name="salvarPJ" />
            <input type="reset" value="Limpar" name="limpar" />
        </form>
        <br><br>
        <?php
        // put your code here
        $gerPJ->getAll();
        ?>
    </body>
</html>

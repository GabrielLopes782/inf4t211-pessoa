<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaJ.php';
$idPessoa=0;
if(isset($_POST['update'])){
    $idPessoa=$_POST['id'];
}
$cadPjs= new cPessoaJ();
$pessoaJ=$cadPjs->getPessoaJById($idPessoa);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Jurídica</h1>
        <br><br>
        <form action="<?php $cadPjs->updatePessoaJ(); ?>" method="POST">
            <input value="<?php echo $pessoaJ[0]['idPessoa']; ?>"  type="hidden" name="idPessoa"/>
            <input value="<?php echo $pessoaJ[0]['nome']; ?>" type="text" required name="nome"/>
            <br><br>
            <input value="<?php echo $pessoaJ[0]['nomeFantasia'];?>"type="text" required name="nomeFantasia"/>
            <br><br>
            <input value="<?php echo $pessoaJ[0]['telefone']; ?>" required type="tel" name="tel"/>
            <br><br>
            <input value="<?php echo $pessoaJ[0]['email']; ?>" required type="email" name="email"/>
            <br><br>
            <input value="<?php echo $pessoaJ[0]['endereco']; ?>" required type="text" name="endereco"/>
            <br><br>
            <input value="<?php echo $pessoaJ[0]['cnpj']; ?>" required type="number" name="cpf"/>
            <br><br>
            <input type="submit" value="Salvar" name="updatePJ" />
            <input type="submit" value="Cancelar" name="cancelarUP"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>

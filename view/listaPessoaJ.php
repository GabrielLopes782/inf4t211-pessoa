<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$pjsBD = $_REQUEST['pessoasPJBD'];
$pjbd = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th><th>E-mail</th><th>CPF</th><th>Funções</th>
            </tr>
            <?php
             if ($pjsBD == null) {
                echo "Tabela vazia!";
            } else {
                foreach ($pjsBD as $pj):
                    ?>
                    <tr>
                        <td><?php echo $pj["nome"]; ?> </td>
                        <td><?php echo $pj["email"]; ?> </td>
                        <td><?php echo $pj["cnpj"]; ?> </td>
                        <td>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
             ?>      
                          

                    </body>
                    </html>

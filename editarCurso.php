<?php
    include_once("class/Curso.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $c = new Curso();
        $c->buscarCurso($_GET["cid"]);

        echo "
            <form method='POST'>

            <label>Nome:</label>
            <input type='text' name='nome' value='" . $c->getNome() . "' required><br><br>

            <label>Nível:</label>
            <input type='text' name='nivel' value='" . $c->getNivel() . " ' required><br><br>

            <label>Valor:</label>
            <input type='text' name='valor' value='" . $c->getValor() . " ' required><br><br>

            <label>Descrição:</label>
            <input type='text' name='descricao' value='" . $c->getDescricao() . "' required><br><br>

            <input type='submit' name='atualizar' value='Atualizar'>
            <a href='index.php'>Voltar</a>
        ";

        if ( isset($_REQUEST["atualizar"]) )
        {
           
            $c->setNome($_REQUEST["nome"]);
            $c->setNivel($_REQUEST["nivel"]);
            $c->setValor($_REQUEST["valor"]);
            $c->setDescricao($_REQUEST["descricao"]);

            echo $c->atualizarCurso($_GET["cid"]) == true ?
                    "<p>Curso atualizado.</p>" :
                    "<p>Ocorreu um erro.</p>";
        }
    ?>

</form>
</body>
</html>
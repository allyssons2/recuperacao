<?php
    include_once("class/Curso.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/js/util.js"></script>
</head>
<body>
    <h1>Cadastrar</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="nome">
        <input type="number" name="nivel" placeholder="nível">
        <input type="number" name="valor" placeholder="valor total">
        <input type="text" name="descricao" placeholder="descricao">
        <input type="submit" name="inserir" value="Cadastrar">

        <?php
            if ( isset($_REQUEST["inserir"]) )
            {
                $c = new Curso();
                $c->create($_REQUEST["nome"], $_REQUEST["nivel"], $_REQUEST["valor"], $_REQUEST["descricao"]);
                
                echo $c->cadastrarCurso() == true ?
                        "<p>Curso cadastrado.</p>" :
                        "<p>Ocorreu um erro.</p>";
            }
        ?>
    </form>

    <h1>Lista</h1>
            <?php
                $c = new Curso();
                $lista = $c->listarCurso();

                if ($lista != false)
                {

                    echo "
                        <table>
                        <tr>
                            <th>Nome</th>
                            <th>Nível</th>
                            <th>Valor</th>
                            <th>Descricao</th>
                        </tr>";
    

                    foreach ($lista as $item) {
                        echo "
                             <tr>
                                 <td> " . $item["nome"] . "</td>
                                 <td> " . $item["nivel"] . "</td>
                                 <td> " . $item["valor"] . "</td>
                                 <td> " . $item["descricao"] . "</td>
                                 <td> <a href='editarCurso.php?cid=" . $item["idCurso"] .  "'>Editar</a> </td>
                                 <td> <a href='excluirCurso.php?cid=" . $item["idCurso"] .  "' onClick='return confirmar()'>Excluir</a> </td>
                             </tr>
                        ";
                     }

                    echo " </table>";                     
                
                }
                else {
                    echo "<p>A lista está vazia.</p>";
                }
            ?>
    </section>
</body>
</html>
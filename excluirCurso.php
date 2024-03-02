<?php
    include_once("class/Curso.php");
    $c = new Curso();

    $c->excluirCurso($_GET["cid"]);
    echo "Curso excluído";
?>

<a href="index.php">Voltar</a>
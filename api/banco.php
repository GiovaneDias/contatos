<?php
    $banco = "mysql:host=localhost;port=3306;dbname=produtos";
    $usuario= "root";
    $senha = "";
    try {
        $con = new PDO($banco, $usuario, $senha); 
        $sql = "SELECT * FROM produto";
        $dados = $con->query($sql);
        foreach ($dados as $seq => $valor) {
            echo "<p>";
            print_r($valor["nome"]);
            echo "</p>";
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>

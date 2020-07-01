<?php
    $banco = "mysql:host=localhost;port=3306;dbname=contatos; charset=utf8";
    $usuario = "root";
    $senha = "";
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    try {
        if(isset($_GET['id']) === true) {
            $con = new PDO($banco, $usuario, $senha);
            $sql = "SELECT * FROM contato";
            $sql .= " where codigo = ".$_GET['id']." ";
            $dados = $con->query($sql);
            
            $obj=$dados->fetchAll(PDO::FETCH_ASSOC);
            $resp = json_encode($obj);    
            echo ($resp);
        } else {
            http_response_code(405);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo '{"ERROR":"' . $e->getMessage().'"}';
    }
?>
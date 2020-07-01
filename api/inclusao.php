<?php
    $banco = "mysql:host=localhost;port=3306;dbname=produtos; charset=utf8";
    $usuario = "root";
    $senha = "";
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    try {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $produto = json_decode(file_get_contents('php://input'),true);
            if(isset($produto["nome"])=== true) {
                $con = new PDO($banco, $usuario, $senha);
                $sql = "INSERT INTO produto";
                $sql .= " (nome, descricao, preco, quantidade) ";
                $sql .= " VALUES ";
                $sql .= " (?, ?, ?, ?) ";
                $comando = $con->prepare($sql);
                $comando->execute([
                    $produto["nome"],
                    $produto["descricao"],
                    $produto["preco"],
                    $produto["quantidade"]
                ]);
                $id = $con->lastInsertId();
                http_response_code(201);
                echo('{"codigo":'.$id.'}');
            }  else {
                http_response_code(405);
            }
        }
        else {
            http_response_code(405);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo '{"ERROR":"' . $e->getMessage().'"}';
    }
?>
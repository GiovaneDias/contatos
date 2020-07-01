<?php
    $banco = "mysql:host=localhost;port=3306;dbname=produtos; charset=utf8";
    $usuario = "root";
    $senha = "";
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    try {
        if ($_SERVER['REQUEST_METHOD'] == "PUT") {
            $produto = json_decode(file_get_contents('php://input'),true);
            if(isset($produto["codigo"])=== true) {
                $con = new PDO($banco, $usuario, $senha);
                $sql = " UPDATE produto ";
                $sql .= " SET nome=?, ";
                $sql .= " descricao=?, ";
                $sql .= " preco=?, ";
                $sql .= " quantidade=? ";
                $sql .= " WHERE ";
                $sql .= " codigo=? ";
                $comando = $con->prepare($sql);
                $comando->execute([
                    $produto["nome"],
                    $produto["descricao"],
                    $produto["preco"],
                    $produto["quantidade"],
                    $produto["codigo"]
                ]);
                http_response_code(200);
                echo('{"codigo":'.$produto["codigo"].'}');
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
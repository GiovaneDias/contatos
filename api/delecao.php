<?php
    $banco = "mysql:host=localhost;port=3306;dbname=produtos; charset=utf8";
    $usuario = "root";
    $senha = "";
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    try {
        if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
            $produto = json_decode(file_get_contents('php://input'),true);
            if(isset($produto["codigo"])=== true) {
                $con = new PDO($banco, $usuario, $senha);
                $sql = " DELETE FROM produto ";
                $sql .= " WHERE ";
                $sql .= " codigo=? ";
                $comando = $con->prepare($sql);
                $comando->execute([
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
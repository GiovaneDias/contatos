<?php
$banco = "mysql:host=localhost;port=3306;dbname=produtos; charset=utf8";
$usuario = "root";
$senha = "";
try {
    $con = new PDO($banco, $usuario, $senha);
    $sql = "SELECT * FROM produto";
    if(isset($_GET['pesq']) === true) {
        $sql .= " where nome like '%".$_GET['pesq']."%' ";
    }
    
    $dados = $con->query($sql);
    $resp = json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    echo ($resp);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
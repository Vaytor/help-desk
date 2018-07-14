<?php 

    require_once("../connects/conec_mysql.php");

    $obj_db = new db();
    $mysqli = $obj_db->conec_mysql();

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha' ";

    $result = $mysqli->query($query);

    if (!$result) {
        die('Erro:' . mysqli_error());
    }else{
        $dados = mysqli_fetch_array($result);
        var_dump($dados);
    }

<?php

use Database\database;

    if(isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    } else {
        $nome = null;
    }

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = null;
    }

    if(isset($_POST['senha'])) {
        $senha = $_POST['senha'];
    } else {
        $senha = null;
    }

    if(isset($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
    } else {
        $telefone = null;
    }

////////////////////////////////////////////////////////

require_once "../eduarda_v/database/Database.php";
$db = new Database();

$resultDb = $db->insert(
    "INSERT INTO `usuarios`(`EMAIL`, `SENHA`, `NOME`, `TELEFONE`)
    VALUES ('$email','$senha','$nome','$telefone')"
);

//var_dump($resultDb);

if($resultDb) : ?>
     <script>
        alert("Usuário registrado!\nFaça login.");
        window.location.replace('index.html');
     </script>
 <?php else : ?>
     <script>
         alert("Falha no registro. Tente novamente.");
         window.location.replace('registro.html');
     </script>
 <?php endif;
?>
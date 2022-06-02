<?php

use Database\database;

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = null;
    }

    if(isset($_POST['senha'])) {
        $pass = $_POST['senha'];
    } else {
        $pass = null;
    }

////////////////////////////////////////////////////////

require_once "../eduarda_v/database/Database.php";
$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM usuarios WHERE email = '$email'; "
);

if( isset($resultDb[0]) ) {
    $emailDb = $resultDb[0]->EMAIL;
    $senhaDb = $resultDb[0]->SENHA;
} else {
    $emailDb = null;
    $senhaDb = null;
}

//var_dump($resultDb[0]);

////////////////////////////////////////////////////////

    if($email != null && $pass != null) {
        if($email == $emailDb && $pass == $senhaDb) : ?>
            <script>
                window.location.replace('inicio.html');
            </script>
        <?php else : ?>
            <script>
                alert("Usuário ou senha incorretos!");
                window.location.replace('index.html');
            </script>
        <?php endif;
    }

?>
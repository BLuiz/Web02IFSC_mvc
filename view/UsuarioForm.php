<?php
include "../controller/UsuarioController.php";

$usuario = new UsuarioController();

if(!empty($_POST)){
    $usuario->salvar($_POST);
}

if(!empty($_GET['id'])){
    $data = $usuario->buscar($_GET['id']);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Test</title>
</head>
<body>
    <form action="UsuarioForm.php" method="POST">
        <label for="nome">Nome: </label></br>
        <input type="text" name="nome" placeholder="Luiz da Silva"/></br>
        <label for="telefone">Telefone: </label></br>
        <input type="text" name="telefone" placeholder="(99) 9 9999-9999"/></br>
        </br>
        <input type="submit" value="Salvar"/>

    </form>
    
</body>
</html>
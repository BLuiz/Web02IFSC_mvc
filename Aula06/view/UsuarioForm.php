<?php
include "../controller/UsuarioController.php";
include '../Util.class.php';

Util::verificar();


$usuario = new UsuarioController();

if(!empty($_POST['id'])){
    $usuario->update($_POST);
    header("location: UsuarioList.php");
}
elseif(!empty($_POST)){
    $usuario->salvar($_POST);
    header("location: UsuarioList.php");
}

if(!empty($_GET['id'])){
    $data = $usuario->buscar($_GET['id']);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <form action="UsuarioForm.php" method="POST">
        <input type="hidden" name="id" value="<?php echo !empty($data->id) ?$data->id : "" ?>">
        <label for="nome">Nome: </label></br>
        <input type="text" name="nome" value="<?php echo !empty($data->nome) ?$data->nome : "" ?>"/></br>
        <label for="telefone">Telefone: </label></br>
        <input type="text" name="telefone" value="<?php echo !empty($data->telefone) ?$data->telefone : "" ?>"/></br>
        </br>
        <input type="submit" value="Salvar"/>

    </form>
    







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>